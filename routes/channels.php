<?php

use App\Broadcasting\AnswerChannel;
use App\Broadcasting\ReviewChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('review', ReviewChannel::class);
Broadcast::channel('answer.{review_id}', AnswerChannel::class);
