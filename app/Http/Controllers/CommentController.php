<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function getAllComments($id)
    {
        $comments = Comment::where('massage_place_id', $id)->get();

        if ($comments->isEmpty())
            return ApiResponse::createFailedResponse(["No comments found"], 404);

        return ApiResponse::createSuccessResponse(CommentResource::collection($comments));
    }
}
