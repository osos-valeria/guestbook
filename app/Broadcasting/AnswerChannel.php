<?php

namespace App\Broadcasting;

use App\Models\Review;
use App\Models\User;

class AnswerChannel
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, Review $review): array|bool
    {
        return $user->id === $review->user_id;
    }
}
