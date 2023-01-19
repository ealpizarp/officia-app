<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();
            $listing = $request->route('listing');

            // if user is not admin take him to his dashboard
            if ( $user->isAdmin() ) {
                return $next($request);
            }

            // allow admin to proceed with request
            else if ( $user->isUser() && $user->id == $listing->user_id) {
                return $next($request);
            }
        }

        abort(403);  // permission denied error
    }
    
}
