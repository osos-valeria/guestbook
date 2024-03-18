<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()/*: JsonResponse*/
    {
        return Review::paginate();
    }

    public function store(Request $request): JsonResponse
    {
//        if ($request->expectsJson()) {
//            // ...
//        }

        return response()->json(["message" => $request->message]);
    }

}
