<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json(
                ['access_token' => Auth::user()->createToken(User::TOKEN_NAME, expiresAt: now()->addHour())->plainTextToken],
                Response::HTTP_CREATED
            );
        }

        return response()->json(
            ['message' => 'The provided credentials do not match our records.'],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
