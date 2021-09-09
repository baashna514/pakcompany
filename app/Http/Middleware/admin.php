<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class admin
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
       if( Auth::check()){
      
            if(Auth::user()->is_admin==1 || Auth::user()->is_admin== 2){
                return $next($request);
            }
            else{
                return redirect()->route('admin.login');
            }
        }
        else{
            return redirect()->route('admin.login');
        }
        
    }
}
