<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Owner
{
    /**
     * Check if the logged user has the permissions to access the provided resource
     * Example : $this->middleware('owner:resourceName')
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $resourceName)
    {
        $user_id = $request->$resourceName->user_id;
        $logged_user = $request->user();
        if ($logged_user->id != $user_id && $logged_user->is_admin != 1) {

            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                Session::flash('error',trans('global.unauthorized_page'));
                return redirect('/');
            }

        }

        return $next($request);
    }
}
