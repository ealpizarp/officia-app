<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();

            // if user is editor, allow the request to continue
            if ( $user->isUser() && $role === 'editor') {
                return $next($request);
            }

            // allow admin to proceed with request
            else if ( $user->isAdmin() ) {
                return $next($request);
            }

            // if user is not editor, then the request is denied
            else if ( $user->isUser() ) {
                abort(403);
            }
        }

        abort(403);  // permission denied error
    }   
}
