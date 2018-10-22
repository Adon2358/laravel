<?php

namespace App\Http\Middleware;

use Closure;

class BackMiddleware
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
        if(!Session()->has('admin'))
        {
            return redirect('/prompt')->with([
                'message'=>'请先登录！',
                'url' =>'admin/login',
                'jumpTime'=>3,
                'status'=>false
            ]);
        }
        return $next($request);
    }
}
