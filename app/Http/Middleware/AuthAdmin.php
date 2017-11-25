<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
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
        // dd($request->user()->hasRole('editor'));
        if( !$request->user() ) {
            return redirect('/');
        }

        if(!$request->user()->hasRole('editor') && !$request->user()->hasRole('admin')) {
            return redirect('/');
        }

        if(!$request->user()->hasRole('admin'))
        {
            if($request->user()->hasRole('editor'))
            {
                return $next($request);

            } else {

                return redirect('/');

            }
        }

        return $next($request);
    }
}
