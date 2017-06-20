<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class company
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
      // check user if login and this user is company or not
      if(Auth::check() && Auth::user()->isRole()=="company")
      {
        //if this user really company then redirect to their home
          return $next($request);
      }
      return redirect('login'); // if this is not company the redirect to login
    }
}
