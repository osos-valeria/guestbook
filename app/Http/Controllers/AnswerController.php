<?php

namespace App\Http\Controllers;

use App\Events\AddReviewAnswer;
use App\Models\Answer;
use App\Models\Review;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnswerController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'message' => ['required'],
            'review_id' => ['required'],
        ]);

        $reviewId = $request->review_id;

        try {
            Answer::create([
                'user_id' => $request->user()->id,
                'message' => $request->message,
                'review_id' => $reviewId,
            ]);

            AddReviewAnswer::dispatch(Review::where('id', $reviewId)->first());
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
