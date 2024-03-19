<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $reviews = Review::paginate();
        } catch (Exception $e) {
            return response()->json(
                ['message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return response()->json(
            $reviews,
            Response::HTTP_OK
        );
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'message' => ['required'],
        ]);

        try {
            Review::create([
                'user_id' => $request->user()->id,
                'message' => $request->message,
            ]);
        } catch (Exception $e) {
            return response()->json(
                ['message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return response()->json(
            ["message" => $request->message],
            Response::HTTP_CREATED
        );
    }

}
