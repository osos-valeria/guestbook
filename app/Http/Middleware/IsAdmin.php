<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Response as HTTPResponse;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->roles()->where('name', Role::Admin->value)->count() > 0) {
            return $next($request);
        }

        return response()->json(
            ['message' => 'You are unauthorised to access this page'],
            HTTPResponse::HTTP_FORBIDDEN
        );
    }
}
