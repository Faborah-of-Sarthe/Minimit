<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return View::make('account.dash');
    }
}
