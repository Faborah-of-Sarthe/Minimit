<?php

namespace App\Http\Controllers;

use App\Image;
use App\Poster;
use Illuminate\Support\Facades\Session;
use View;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'randomPoster']]);
        $this->middleware('admin', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posters = Poster::orderBy('created_at', 'desc')->paginate(3);
        return View::make('poster.index', compact('posters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = [];
        $poster = $oeuvreTitle = null;
        return View::make('poster.add', compact('images', 'poster', 'oeuvreTitle'));
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
     * Display the specified resource.
     *
     * @param  object $poster
     * @return \Illuminate\Http\Response
     */
    public function show(Poster $poster)
    {


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

        if($poster->user->id == $user->id || $user->is_admin == 1) {

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

        } else {

            Session::flash('error',trans('poster.owner_error'));

        }
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
        $user = auth()->user();
        if (!$request->ajax())
            return false;

        if($user->id == $poster->user_id || $user->is_admin == 1) {
            $poster->delete();
            return json_encode($poster->id);
        }
        else {
            return response('Unauthorized.', 401);
        }
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
