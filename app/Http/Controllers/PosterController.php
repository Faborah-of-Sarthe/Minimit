<?php

namespace App\Http\Controllers;

use App\Image;
use App\Poster;
use View;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'randomPoster']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'test';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = [];
        $poster = null;
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
                $attached_images[] = $imageId;
        }

        $poster = new Poster();
        $poster->oeuvre()->associate($request->oeuvre_id);
        $poster->images()->saveMany($attached_images);
        $poster->save();

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
        return View::make('poster.edit', compact('poster'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object $poster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster)
    {
        //
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
