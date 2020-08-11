<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiaryRequest;
use Illuminate\Http\Request;
use App\Repositories\DiaryRepository\DiaryRepositoryInterface;

class DiaryController extends Controller
{
    private $diaryRepo;

    public function __construct(DiaryRepositoryInterface $diaryRepo)
    {
        $this->diaryRepo = $diaryRepo;
    }

    public function getDiaryOfUser(DiaryRequest $request)
    {
        $title = $request->title;
        $perPage = $request->perpage ?? config('diary.perpage', 10);

        $getAllDiary = $this->diaryRepo->getDiaryOfUser($title, $perPage);

        return response()->json($getAllDiary);
    }

    public function getAllPublicDiary(DiaryRequest $request)
    {
        $title = $request->title;
        $perPage = $request->perpage ?? config('diary.perpage', 10);

        $allPublicDiary = $this->diaryRepo->getAllPublicDiary($title, $perPage);

        return response()->json($allPublicDiary);
    }
}
