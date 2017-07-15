<?php

namespace App\Http\Middleware;

use Closure;

use App\Role;

use Auth;

use Session;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(Auth::user()->role->customer))
        {
            Session::flash('info', 'You do not have permissions to perform this action');

            return redirect()->back();
        }
        return $next($request);
    }
}
