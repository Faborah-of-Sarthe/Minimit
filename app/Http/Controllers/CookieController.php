<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;

class CookieController extends Controller
{

    /**
     * Set a cookie with provided name and value
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function set(Request $request)
    {
        if(!$request->name || !$request->value)
            return response('Error : The cookie format is wrong.');

        $duration = ($request->duration && is_numeric($request->duration)) ? $request->duration : 1440;

        $cookie = Cookie::make($request->name, $request->value, $duration);

        return Response::make('')->withCookie($cookie);
    }
}
