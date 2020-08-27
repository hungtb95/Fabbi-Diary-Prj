<?php

namespace App\Repositories\DiaryRepository;

interface DiaryRepositoryInterface
{
    public function getDiaryOfUser();
    public function getAllPublicDiary();
    public function getDetailDiaryOfUser($diaryID);
    public function createNewDiaryOfUser($request);
    public function updateDiaryOfUser($request);
    public function deleteDiaryOfUser($request);
    public function reaction($request);
}
