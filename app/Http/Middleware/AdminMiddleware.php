<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // Check if the user is authenticated
        if (auth()->check()) {
            // Retrieve the authenticated user
            $user = auth()->user();

            // Check if the user has the admin type
            if ($user->type === 'admin') {
                return $next($request);
            }
        }

        // If the user is not an admin, redirect or return an error response
        return redirect('/');
    }
}
