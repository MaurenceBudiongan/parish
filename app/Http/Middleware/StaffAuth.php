<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if staff is logged in
        if (!session('staff_logged_in')) {
            return redirect()->route('staff.login')->with('error', 'Please login to access this page.');
        }
        
        return $next($request);
    }
}
