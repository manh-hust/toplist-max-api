<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\MassagePlace;

class CommentController extends Controller
{
    public function getAllCommentsPlace($id)
    {
        $comments = Comment::where('massage_place_id', $id)->get();

        if ($comments->isEmpty())
            return ApiResponse::createFailedResponse(["No comments found"], 404);

        return ApiResponse::createSuccessResponse(CommentResource::collection($comments));
    }

    public function createComment(CommentRequest $request, $id)
    {
        $massagePlace = MassagePlace::find($id);
        if (!$massagePlace)
            return ApiResponse::createFailedResponse(["Massage place not found"], 404);

        $comment = new Comment();
        $comment->nickname = request()->nickname;
        $comment->content = request()->content;
        $comment->massage_place_id = $id;
        if (request()->has('email')) {
            $comment->email_address = request()->email;
        } else
            $comment->email_address = null;
        $comment->save();

        return ApiResponse::createSuccessResponse([]);
    }

    public function getAllComments()
    {
        $comments = Comment::with('massagePlace')->whereHas('massagePlace', function ($query) {
            $query->where('status', '=', 1);
        })->get();

        return ApiResponse::createSuccessResponse(CommentResource::collection($comments));
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if (!$comment)
            return ApiResponse::createFailedResponse(["Comment not found"], 404);

        $comment->delete();

        return ApiResponse::createSuccessResponse([]);
    }
}
