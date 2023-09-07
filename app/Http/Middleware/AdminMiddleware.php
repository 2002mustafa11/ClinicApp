<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $role =  User::firstWhere('email', auth()->user()->email)->role;

        if ($role =='u') {
            // dd($role);
            abort(403, 'Unauthorized');
        }
        
        return $next($request);
    }
}
