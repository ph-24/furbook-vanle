<?php

namespace Furbook\Http\Middleware;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Closure;
use Auth;

class IsAdministrator
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
        if (!Auth::user()->isAdministrator()) {
            if ($request->ajax()) {
                return response('Forbidden', 403);
            }else{
                throw new AccessDeniedException('Forbidden');
            }
        }
        return $next($request);
    }
}
