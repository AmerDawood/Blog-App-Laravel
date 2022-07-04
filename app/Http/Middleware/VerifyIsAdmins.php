<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;


 class VerifyIsAdmins extends Middleware
{
  
    public function handle($request, Closure $next)
    {
        if(! auth()->user()->isAdmin()){
         return redirect('home');
        }
          return $next($request);
        
    }
   
  
}
