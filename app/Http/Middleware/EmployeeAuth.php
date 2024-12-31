<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeAuth
{
    public function handle(Request $request, Closure $next)
    {

        if($request->session()->has('pptcEmployee')){

        }else{
            session()->flash('error','Access Denied');
            return redirect('/');
        }
        return $next($request);
    }
}
