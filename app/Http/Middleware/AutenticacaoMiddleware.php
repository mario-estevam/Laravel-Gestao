<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;

class AutenticacaoMiddleware
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
        if(false){
            return $next($request);

        }else{
            return Response('Aceso negado');
        }


    }
}
