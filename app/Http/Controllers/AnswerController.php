<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request): JsonResponse
    {
//        if ($request->expectsJson()) {
//            // ...
//        }

        return response()->json(["message" => $request->message]);
    }
    //
}
