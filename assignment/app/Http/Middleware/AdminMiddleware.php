<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
       //  $user=$request->user();
       // if($user!=null)
       // {
       //      if($user->admin)
       //          return $next($request);
       //      else
       //          return redirect('/');
       // } 

       //  return redirect('/');
        return $next($request);
    }
}
