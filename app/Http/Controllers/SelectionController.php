<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Selection;
use App\Poster;
use View;

class SelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  Selection $selection
     * @return \Illuminate\Http\Response
     */
    public function show(Selection $selection)
    {
        $posters     = $selection->posters->values();
        $poster      = $posters->get(0);
        $next        = $posters->get(1);
        $details     = $poster->getPosterDetails();
        $idNext      = $next->id;
        $idSelection = $selection->id;

        return View::make('selection.show', compact('poster', 'details', 'idNext', 'idSelection'));
    }

    /**
     * Navigate between the different posters of a selection
     */
    public function navigation(Request $request)
    {
        // Return an error an ajax parameter is missing
        if(empty($request->posterId) || empty($request->selectionId)){
            $message = trans('poster.ajax_error');
            return '<div class="error">'.$message.'</div>';
        }

        $idSelection = $request->selectionId;
        $selection = Selection::find($idSelection);

        // Retrieve the poster to display with the relationship pivot attributes
        $poster = $selection->posters()->where('poster_id', $request->posterId)->first();
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

        return View::make('poster.poster', compact('poster', 'details', 'idPrev', 'idNext', 'idSelection'));
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
        //
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
        //
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
}
