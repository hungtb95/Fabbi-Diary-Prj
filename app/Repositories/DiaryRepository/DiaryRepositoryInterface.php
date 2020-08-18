<?php

namespace App\Repositories\DiaryRepository;

interface DiaryRepositoryInterface
{
    public function getDiaryOfUser($title, $perPage);
    public function getAllPublicDiary($title, $perPage);
    public function getDetailDiaryOfUser($diaryID);
    public function createNewDiaryOfUser($request);
    public function updateDiaryOfUser($request);
    public function deleteDiaryOfUser($request);
}
