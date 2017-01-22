<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    /**
     * Switch the locale to the provided language
     * @param string $lang
     */
    public function switch($lang)
    {
        Session::put('locale', $lang);
        return redirect()->back();
    }
}
