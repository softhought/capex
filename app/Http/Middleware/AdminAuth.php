<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {

        if($request->session()->has('pptcAdmin')){

        }else{
            session()->flash('error','Access Denied');
            return redirect('admin');
        }
        return $next($request);
    }
}
