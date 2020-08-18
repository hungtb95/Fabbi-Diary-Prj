<?php

namespace App\Repositories\DiaryRepository;

use App\Repositories\CommonRepository\BaseRepositoryClass;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DiaryRepositoryClass extends BaseRepositoryClass implements DiaryRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Diary::class;
    }

    public function getDiaryOfUser($title, $perPage)
    {
        try {
            $userID = Auth::id();

            if (empty($title)) {
                $allPublicDiary = DB::table('diaries')
                    ->where('user_id', '=', $userID)
                    ->paginate($perPage);
            } else {
                $allPublicDiary = DB::table('diaries')
                    ->where([
                        ['user_id', '=', $userID],
                        ['title', 'like', $title],
                    ])
                    ->paginate($perPage);
            }

            return $allPublicDiary;
        } catch (Exception $ex) {
            return $error = [
                'userMessage' => 'System Error',
                'internalMessage' => $ex->getMessage(),
                'code' => 500,
            ];
        }
    }

    public function getAllPublicDiary($title, $perPage)
    {
        try {
            $public = config('diary.public');

            if (empty($title)) {
                $allPublicDiary = DB::table('diaries')
                    ->where('access_range', '=', $public)
                    ->paginate($perPage);
            } else {
                $allPublicDiary = DB::table('diaries')
                    ->where([
                        ['title', 'like', $title],
                        ['access_range', '=', $public]
                    ])
                    ->paginate($perPage);
            }

            return $allPublicDiary;
        } catch (Exception $ex) {
            return $error = [
                'userMessage' => 'System Error',
                'internalMessage' => $ex->getMessage(),
                'code' => 500,
            ];
        }
    }

    public function getDetailDiaryOfUser($diaryID)
    {
        try {
            $public = config('diary.public');
            $userID = Auth::check() ? Auth::id() : null;

            if ($userID == null) {
                $detailDiary = DB::table('diaries')
                    ->where([
                        ['access_range', $public],
                        ['id', $diaryID],
                    ])
                    ->get();
            } else {
                $detailDiary = DB::table('diaries')
                    ->where([
                        ['user_id', $userID],
                        ['id', $diaryID],
                    ])
                    ->get();
            }

            return $detailDiary;
        } catch (Exception $ex) {
            return $error = [
                'userMessage' => 'System Error',
                'internalMessage' => $ex->getMessage(),
                'code' => 500,
            ];
        }
    }

    public function createNewDiaryOfUser($request)
    {
        try {
            $detailDiaryArray = [
                'user_id' => Auth::id(),
                'title' => $request->title,
                'content' => $request->content,
                'access_range' => $request->access_range,
            ];

            $this->create($detailDiaryArray);

            return true;
        } catch (Exception $ex) {
            return $error = [
                'userMessage' => 'System Error',
                'internalMessage' => $ex->getMessage(),
                'code' => 500,
            ];
        }
    }

    public function updateDiaryOfUser($request)
    {
        try {
            $diaryID = $request->diaryID;

            $detailUpdateDiaryArray = [
                'title' => $request->title,
                'content' => $request->content,
                'access_range' => $request->access_range,
            ];

            $updateDiary = $this->update($diaryID, $detailUpdateDiaryArray);

            if (!$updateDiary) {
                return [
                    'status' => 'error',
                    'data' => [
                        'internalMessage' => 'No record found',
                        'code' => 404
                    ]
                ];
            } else {
                return [
                    'status' => 'success',
                    'data' => [
                        'internalMessage' => 'Update successful',
                        'code' => 200
                    ]
                ];
            }
        } catch (Exception $ex) {
            return [
                'status' => 'error',
                'data' => [
                    'userMessage' => 'System Error',
                    'internalMessage' => $ex->getMessage(),
                    'code' => 500,
                ]
            ];
        }
    }
}
