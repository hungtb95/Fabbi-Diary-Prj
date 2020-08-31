<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Diary;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiaryRequest;
use App\Repositories\DiaryRepository\DiaryRepositoryInterface;

use Illuminate\Support\Facades\Auth;

class DiaryController extends BaseAPIController
{
    private $diaryRepo;

    public function __construct(DiaryRepositoryInterface $diaryRepo)
    {
        $this->diaryRepo = $diaryRepo;
    }

    public function getDiaryOfUser(Request $request)
    {
        $title = $request->title;

        $getAllDiary = $this->diaryRepo->getDiaryOfUser($title);

        return response()->json($getAllDiary);
    }

    public function getAllPublicDiary(Request $request)
    {
        $title = $request->title;

        $allPublicDiary = $this->diaryRepo->getAllPublicDiary($title);

        return response()->json($allPublicDiary);
    }

    public function getDetailDiary($diaryID)
    {
        $detailDiaries = $this->diaryRepo->getDetailDiaryOfUser($diaryID);

        return response()->json($detailDiaries);
    }

    public function createDiary(Request $request)
    {
        $newDiary = $this->diaryRepo->createNewDiaryOfUser($request);

        return response()->json($newDiary);
    }

    public function update(DiaryRequest $request)
    {
        $updateDiary = $this->diaryRepo->updateDiaryOfUser($request);

        return response()->json($updateDiary, $updateDiary['data']['code']);
    }

    public function delete(DiaryRequest $request)
    {
        $deleteDiary = $this->diaryRepo->deleteDiaryOfUser($request);

        return response()->json($deleteDiary, $deleteDiary['data']['code']);
    }

    public function expressReaction(Request $request)
    {
        $statusAddReaction = $this->diaryRepo->reaction($request);

        if ($statusAddReaction['status'] == 'error') {
            return $this->responseError($statusAddReaction['data']['code'], 'reaction false');
        }

        return $this->responseSuccess($statusAddReaction, 'reaction success');
    }
}
