<?php


namespace Modules\login\Http\Middleware;


use Closure;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(auth('admin')->check()){
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
