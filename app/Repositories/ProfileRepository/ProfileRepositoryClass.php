<?php

namespace App\Repositories\ProfileRepository;

use App\Repositories\CommonRepository\BaseRepositoryClass;

use App\Models\Diary;

class ProfileRepositoryClass extends BaseRepositoryClass implements ProfileRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Profile::class;
    }

    public function show($profile)
    {
        $userID = $profile->user_id;
        $views = 0;
        $diaries = Diary::where('user_id',$userID)
            ->with(['diaryView' => function($q) use (&$views){
                $views = $q->sum('view');
            }])
            ->get();
        
        $data = [
            'profile' => $profile,
            'countDiaries' => count($diaries),
            'countView' => $views,
        ];
        return $data;
    }
}
