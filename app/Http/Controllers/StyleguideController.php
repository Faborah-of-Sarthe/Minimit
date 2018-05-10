<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StyleguideController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faker = \Faker\Factory::create();
        return view('styleguide', compact("faker"));
    }
}
