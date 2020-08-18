<?php

namespace App\Repositories\CommentRepository;

use App\Repositories\CommonRepository\BaseRepositoryClass;
use Exception;
use Illuminate\Support\Facades\Auth;

class CommentRepositoryClass extends BaseRepositoryClass implements CommentRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Comment::class;
    }

    public function createNewComment($request)
    {
        try {
            $detailCommentArray = [
                'user_id' => Auth::id(),
                'diary_id' => $request->diary_id,
                'content' => $request->content,
            ];

            $comment = $this->create($detailCommentArray);

            return [
                'status' => 'success',
                'data' => [
                    'data' => $comment,
                    'internalMessage' => 'Comment has been created',
                    'code' => 200
                ]
            ];
        } catch (Exception $ex) {
            return [
                'status' => 'error',
                'data' => [
                    'userMessage' => 'System Error',
                    'internalMessage' => $ex->getMessage(),
                    'code' => 500
                ]
            ];
        }
    }
}
