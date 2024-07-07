<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminOrTechnician
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Check if the user is admin or technician
        if ($user->user_type == 'admin' || $user->user_type == 'technician') {
            return $next($request);
        }
        // Redirect to dashboard for other user types
        return redirect('dashboard');
    }
}
