<?php


namespace Modules\login\Http\Middleware;


use Closure;
use Modules\comment\Models\Comment;

class CheckIfAuthenticated
{
    public function handle($request, Closure $next)
    {
        if(!auth('admin')->check()){
            return redirect('/');
        }
        return $next($request);
    }
}
