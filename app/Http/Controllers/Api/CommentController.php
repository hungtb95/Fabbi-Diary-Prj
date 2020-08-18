<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository\CommentRepositoryInterface;
// use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function store(CommentRequest $request)
    {
        $newComment = $this->commentRepo->createNewComment($request);

        return response()->json($newComment, $newComment['data']['code']);
    }
}

