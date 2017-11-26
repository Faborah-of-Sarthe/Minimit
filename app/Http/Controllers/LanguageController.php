<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cookie;

class LanguageController extends Controller
{
    /**
     * Switch the locale to the provided language
     * @param string $lang
     */
    public function switchLang($lang)
    {
        $cookie = Cookie::forever('language', $lang);
        Session::put('locale', $lang);
        return redirect()->back()->withCookie($cookie);
    }
}
