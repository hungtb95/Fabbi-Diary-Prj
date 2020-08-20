<?php

namespace App\Repositories\CommentRepository;

use App\Repositories\CommonRepository\BaseRepositoryClass;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentRepositoryClass extends BaseRepositoryClass implements CommentRepositoryInterface
{ 
    public function getModel()
    {
        return \App\Models\Comment::class;
    }

    public function getComments($diaryID)
    {
        $comments = Comment::where('diary_id', $diaryID)
            ->paginate(config('comment.perpage', 10));

        return $comments;
    }

    public function store($request)
    {
        $detailCommentArray = [
            'user_id' => Auth::id(),
            'diary_id' => $request->diary_id,
            'content' => $request->content,
        ];

        $comment = $this->create($detailCommentArray);
        
        return $comment;
    }
}

