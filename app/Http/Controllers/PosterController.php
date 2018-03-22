<?php

namespace App\Http\Controllers;

use App\Image;
use App\Poster;
use Illuminate\Support\Facades\Session;
use View;
use Illuminate\Http\Request;

class PosterController extends Controller
{

    public $_pagination = 15;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'randomPoster']]);
        $this->middleware('ajax', ['only' => ['destroy', 'filter']]);
        $this->middleware('owner:poster', ['only' => ['destroy', 'update', 'edit']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('poster.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = [];
        $poster  = null;
        return View::make('poster.add', compact('images', 'poster'));
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
            'oeuvre_id' => 'required|exists:oeuvres,id',
            'image_ids' => 'required',
        ]);

        // Check on provided images
        $images = explode(',', $request->image_ids);
        $attached_images = [];
        foreach ($images as $key => $imageId) {
            $image = Image::find($imageId);
            if($key < 5 && $image->user_id == $user->id)
                $attached_images[$imageId] = ['order' => $key +1];
        }
        $poster = new Poster();
        $poster->oeuvre()->associate($request->oeuvre_id);
        $poster->user_id = $user->id;
        $poster->save();
        $poster->images()->sync($attached_images);

        Session::flash('message',trans('poster.creation_success_message'));
        return redirect()->route('poster.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  object $poster
     * @return \Illuminate\Http\Response
     */
    public function edit(Poster $poster)
    {
        $images = $poster->images;
        $oeuvreTitle = $poster->oeuvre->getTitleAttribute();
        return View::make('poster.edit', compact('poster', 'images', 'oeuvreTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object $poster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poster $poster)
    {
        $user = auth()->user();
        $this->validate($request, [
            'oeuvre_id' => 'required|exists:oeuvres,id',
            'image_ids' => 'required',
        ]);


        // Check on provided images
        $images = explode(',', $request->image_ids);
        $attached_images = [];
        foreach ($images as $key => $imageId) {
            $image = Image::find($imageId);
            if($key < 5 && $image->user_id == $user->id)
                $attached_images[$imageId] = ['order' => $key +1];
        }
        $poster->images()->sync($attached_images);
        $poster->oeuvre()->associate($request->oeuvre_id);
        $poster->save();
        Session::flash('message',trans('poster.edit_success_message'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Poster $poster)
    {
            $poster->selections()->detach();
            $poster->delete();
            return json_encode($poster->id);
    }

    /**
     * Retrieve the  posters of the current user (or all for an admin user) filtered
     * @param Request $request
     * @return bool
     */
    public function filter(Request $request)
    {

        $filters = $request->all();
        $posters = Poster::myPosters();

        foreach ($filters as $filter => $value) {

            if ($filter == 'page')
                continue;

            if(!empty($value)) {
                $posters->where($filter. '_id', $value);
            }
        }

        $posters = $posters->with( ['user', 'images'])->paginate($this->_pagination);

        return View::make('poster.elements.posters', compact('posters'));
    }

    /**
     * Retrieve a list of filtered posters
     * @param Request $request
     * @return bool
     */
    public function search(Request $request)
    {

        $filters = $request->all();
        $posters = Poster::query();

        foreach ($filters as $filter => $value) {

            if ($filter == 'page')
                continue;

            if(!empty($value)) {
                $posters->where($filter. '_id', $value);
            }
        }

        $posters = $posters->with( ['user', 'images'])->paginate($this->_pagination);

        return View::make('poster.elements.posters-selection', compact('posters'));
    }

    /**
     * Return the poster informations for selection page
     *
     * @param  object $poster
     * @return \Illuminate\Http\Response
     */
    public function select(Poster $poster)
    {
        return View::make('selection.elements.poster', compact('poster'));
    }


    /**
     * Return the random poster page or an ajax view of a random poster
     */
    public function randomPoster(Request $request)
    {
        $poster = Poster::inRandomOrder()->first();
        $details = $poster->getPosterDetails();

        if ($request->ajax()) {
            return View::make('poster.poster', compact('poster', 'details'));
        }

        return View::make('poster.random', compact('poster', 'details'));
    }


}
