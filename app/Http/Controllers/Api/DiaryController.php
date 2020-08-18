<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiaryRequest;
use App\Repositories\DiaryRepository\DiaryRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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

    public function getDetailDiary($diaryID)
    {
        $detailDiaries = $this->diaryRepo->getDetailDiaryOfUser($diaryID);

        return response()->json($detailDiaries);
    }

    public function createDiary(DiaryRequest $request)
    {
        $newDiary = $this->diaryRepo->createNewDiaryOfUser($request);

        return response()->json($newDiary);
    }

    public function update(DiaryRequest $request)
    {
        $updateDiary = $this->diaryRepo->updateDiaryOfUser($request);

        return response()->json($updateDiary, $updateDiary['data']['code']);
    }
}
