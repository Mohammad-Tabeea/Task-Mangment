<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
class CheckUser
{
    public function handle(Request $request, Closure $next)
    { 
            if (Auth::user()->role_id == 2) {
                return $next($request);
            }
            return abort(401);
        

    }
}











