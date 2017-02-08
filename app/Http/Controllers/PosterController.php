<?php

namespace App\Http\Controllers;

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
        return View::make('poster.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        // $poster = Poster::find(6);
        $details = $poster->getPosterDetails();

        if ($request->ajax()) {
            return View::make('poster.poster', compact('poster', 'details'));
        }

        return View::make('poster.random', compact('poster', 'details'));
    }


}
