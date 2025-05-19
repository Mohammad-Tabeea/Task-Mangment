<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserMemmber
{

    public function handle(Request $request, Closure $next)
    {



        if ($request->user()->role_id == 1) {
            return $next($request);

        }

        return abort('401');




    }
}
