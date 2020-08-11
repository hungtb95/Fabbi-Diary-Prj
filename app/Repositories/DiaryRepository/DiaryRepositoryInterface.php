<?php

namespace App\Repositories\DiaryRepository;

interface DiaryRepositoryInterface
{
    public function getDiaryOfUser($title, $perPage);
    public function getAllPublicDiary($title, $perPage);
    public function getDetailDiaryOfUser($diaryID);
}
