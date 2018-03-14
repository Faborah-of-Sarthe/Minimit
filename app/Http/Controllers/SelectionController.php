<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Selection;
use App\Poster;
use App\Tag;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class SelectionController extends Controller
{

    protected $_maxPosters = 99;
    public $_pagination = 10;


    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit', 'update', 'destroy', 'store', 'mySelections']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $tags = Tag::all();
        $selections = Selection::query();

        foreach ($filters as $filter => $value) {

            if(!empty($value)) {
                // SEARCH
                if ($filter == 'title' && $value != null) {
                    $selections->where($filter, 'like', '%'.$value.'%');
                }
                // TAGS
                elseif ($filter == 'tags') {
                    $selections->whereHas($filter, function($query) use($value) {
                        $query->whereIn('tag_id', $value);
                    });
                }
            }
        }

        $selections = $selections->with('posters','tags','notes','user','favourites')->orderBy('id', 'desc')->paginate($this->_pagination);

        return View::make('selections.wrapper', compact('selections', 'tags'));
    }

    public function mySelections(Request $request) {
        $selections = Selection::mySelections()->with('user', 'posters')->paginate($this->_pagination);
        return View::make('selection.index', compact('selections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posters = [];
        $tags = Tag::all();
        $cookie = Cookie::get('new_selection');
        if ($cookie) {
            $ids = explode(',', $cookie);
            $posters = Poster::find($ids);
        }

        return View::make('selection.add', compact('posters', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'title' => 'required|max:255',
            'poster' => 'required|array|between:2,100|exists:posters,id',
        ]);
        $attached_posters = $this->preparePosters($request->poster);

        $selection = new Selection();
        $selection->title = $request->title;
        $selection->user_id = $user->id;
        $selection->save();
        $selection->posters()->sync($attached_posters);
        $tags = (isset($request->tags)) ? $request->tags : [];
        $selection->tags()->sync($tags);

        $cookie = Cookie::forget($request->get('cookie-name'));

        Session::flash('message',trans('selection.creation_success_message'));
        return redirect()->route('selection.my')->withCookie($cookie);

    }

    /**
     * Display the specified resource.
     *
     * @param  Selection $selection
     * @return \Illuminate\Http\Response
     */
    public function show(Selection $selection)
    {
        $posters     = $selection->posters->values();
        $count       = count($posters);
        $poster      = $posters->get(0);
        $next        = ($count > 1) ? $posters->get(1) : null;
        $details     = $poster->getPosterDetails();
        $idNext      = (!is_null($next)) ? $next->id : null;
        $idSelection = $selection->id;
        $current     = 1;


        return View::make('selection.show', compact('poster', 'count','details', 'idNext', 'idSelection', 'selection', 'current'));
    }

    /**
     * Navigate between the different posters of a selection
     */
    public function navigation(Request $request)
    {
        // Return an error if an ajax parameter is missing
        if(empty($request->posterId) || empty($request->selectionId)){
            $message = trans('poster.ajax_error');
            return '<div class="error">'.$message.'</div>';
        }

        $idSelection = $request->selectionId;
        $selection = Selection::find($idSelection);
        $count = $selection->posters()->groupBy('poster_id')->count();

        // Retrieve the poster to display with the relationship pivot attributes
        $poster = $selection->posters()->where('poster_id', $request->posterId)->withPivot('order')->first();
        $current = $poster->pivot->order;
        $details = $poster->getPosterDetails();

        // Retrieve the previous and next posters based on pivot order
        $prev = $selection->posters()
                ->wherePivot('order', '<', $poster->pivot->order)->get()->last();

        $next = $selection->posters()
                ->wherePivot('order', '>', $poster->pivot->order)
                ->first();

        // If there is no next poster, we are on the last poster, so we display
        // the final page
        if (!isset($next->id)) {
            $idNext = 'final';
        } else {
            $idNext = $next->id;
        }
        $idPrev = (isset($prev->id)) ? $prev->id : '';

        return View::make('poster.poster', compact('poster','count', 'details', 'idPrev', 'idNext', 'idSelection', 'selection', 'current'));
    }

    /**
     * Show the final page of a selection
     */
    public function finalPage(Request $request)
    {
        $idSelection = $request->selectionId;
        return View::make('selection.final', compact('idSelection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Selection $selection
     * @return \Illuminate\Http\Response
     */
    public function edit(Selection $selection)
    {
        $tags = Tag::all();
        $cookie = Cookie::get('selection_'.$selection->id);
        if ($cookie) {
            $ids = explode(',', $cookie);
            $posters = Poster::whereIn('id',$ids)->with('oeuvre', 'user', 'images')->get();
        } else {
            $posters = $selection->posters('id')->with('oeuvre', 'user', 'images')->get();
        }

        return View::make('selection.edit', compact('selection', 'posters', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Selection $selection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Selection $selection)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'poster' => 'required|array|between:2,100|exists:posters,id',
        ]);
        $attached_posters = $this->preparePosters($request->poster);
        $selection->title = $request->title;
        $selection->save();
        $selection->posters()->sync($attached_posters);
        $tags = (isset($request->tags)) ? $request->tags : [];
        $selection->tags()->sync($tags);

        $cookie = Cookie::forget($request->get('cookie-name'));

        Session::flash('message',trans('selection.update_success_message'));
        return redirect()->route('selection.my')->withCookie($cookie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Selection $selection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selection $selection)
    {
        //
    }

    /**
     * Retrieve a list of filtered selections
     * @param Request $request
     * @return bool
     */
    public function search(Request $request)
    {

    }

    public function preparePosters($posters)
    {
        $attached_posters = [];
        foreach ($posters as $key => $posterId) {
            if($key < $this->_maxPosters)
                $attached_posters[$posterId] = ['order' => $key +1];
        }
        return $attached_posters;
    }
}
