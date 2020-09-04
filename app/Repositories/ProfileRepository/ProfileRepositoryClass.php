<?php

namespace App\Repositories\ProfileRepository;

use App\Repositories\CommonRepository\BaseRepositoryClass;
use Illuminate\Support\Str;
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

    public function updateProfile($profile, $request)
    {
        $data = $request->all();
        $data['birthday'] = date('Y-m-d H:i:s',strtotime($request->birthday));

        if(strlen($request->avatar) > 25){
            $exploded = explode(',',$request->avatar);
            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0], 'jpeg')) {
                $expension = 'jpg';
            } else {
                $expension = 'png';
            }
            $fileName = Str::random(20).'.'.$expension;
            $path = public_path()."/images/avatar/".$fileName;
            file_put_contents($path, $decoded);
            unlink(public_path()."/images/avatar/".$profile->avatar);
            $data['avatar'] = $fileName;
        }
        $result = $profile->update($data);

        return $result;
    }
}

