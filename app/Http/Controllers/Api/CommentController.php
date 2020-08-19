<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseAPIController;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository\CommentRepositoryInterface;
use Exception;

class CommentController extends BaseAPIController
{
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index($diaryID)
    {
        try {
            $comments = $this->commentRepository->getComments($diaryID);

            return $this->responseSuccess($comments, 'Get comments success');
        } catch (Exception $ex) {
            return $this->responseError(500, $ex->getMessage());
        }
    }

    public function store(CommentRequest $request)
    {
        try{
            $newComment = $this->commentRepository->store($request);
            
            return $this->responseSuccess($newComment, 'Create comment success');
        } catch (Exception $ex) {
            return $this->responseError(500, $ex->getMessage());
        }
    }
}

