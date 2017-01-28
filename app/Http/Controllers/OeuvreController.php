<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oeuvre;
use View;
use Session;

class OeuvreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oeuvres = Oeuvre::all();
        return View::make('admin.oeuvre.index', compact('oeuvres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('admin.oeuvre.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ov' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'year' => 'required|max:4',
        ]);
        $oeuvre = new Oeuvre;
        $oeuvre->create($request->all());
        Session::flash('message',trans('oeuvre.create_success_msg'));
        return redirect()->route('oeuvre.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Oeuvre $oeuvre
     * @return \Illuminate\Http\Response
     */
    public function edit(Oeuvre $oeuvre)
    {
        return View::make('admin.oeuvre.edit', compact('oeuvre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Oeuvre $oeuvre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oeuvre $oeuvre)
    {
        $this->validate($request, [
            'title_ov' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'year' => 'required|max:4',
        ]);
        if($request->active == null){
           $request->merge([
               'active' => 0,
           ]);
        }
        $oeuvre->update($request->all());
        Session::flash('message',trans('oeuvre.update_success_msg'));
        return redirect()->route('oeuvre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Oeuvre $oeuvre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oeuvre $oeuvre)
    {
        $oeuvre->delete();
        Session::flash('message',trans('oeuvre.destroy_success_msg'));
        return redirect()->route('oeuvre.index');
    }
}
