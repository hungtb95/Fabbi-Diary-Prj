<?php

namespace App\Repositories\DiaryRepository;

use App\Models\Comment;
use App\Models\Diary;
use App\Models\DiaryView;
use App\Models\ReactionDiary;
use App\Repositories\CommonRepository\BaseRepositoryClass;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiaryRepositoryClass extends BaseRepositoryClass implements DiaryRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Diary::class;
    }

    public function getDiaryOfUser($title)
    {
        try {
            $userID = Auth::id();

            if (empty($title)) {
                $allPublicDiary = Diary::where('user_id', '=', $userID)
                    ->with('comments.user.profile')
                    ->get();
            } else {
                $allPublicDiary = Diary::where([
                    ['user_id', '=', $userID],
                    ['title', 'like', $title],
                ])
                    ->with('comments.user.profile')
                    ->get();
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

    public function getAllPublicDiary($title)
    {
        try {
            $public = config('diary.public');

            if (empty($title)) {
                $allPublicDiary = Diary::where('access_range', '=', $public)
                    ->with([
                        'comments.user.profile',
                        'profile',
                        'reactionDiary'
                    ])
                    ->get();
            } else {
                $allPublicDiary = Diary::with([
                    'comments.user.profile',
                    'profile',
                    'reactionDiary'
                ])
                    ->where([
                        ['title', 'like', '%' . $title . '%'],
                        ['access_range', '=', $public]
                    ])
                    ->get();
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

            DiaryView::firstOrCreate([
                'diary_id' => $diaryID
            ]);

            $diaryView = DiaryView::where('diary_id', $diaryID)->first();

            $diaryView->view += 1;

            DiaryView::where('diary_id', $diaryID)
                ->update(['view' => $diaryView->view]);

            if ($userID == null) {
                $detailDiary = Diary::where('id', $diaryID)
                    ->where('access_range', $public)
                    ->with('diaryView')
                    ->first();
            } else {
                $detailDiary = Diary::where('id', $diaryID)
                    ->where('user_id', $userID)
                    ->with('diaryView')
                    ->first();
            }

            return $detailDiary;
        } catch (Exception $ex) {
            return [
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
                // 'user_id' => Auth::id(),
                'user_id' => 1,
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

    public function deleteDiaryOfUser($request)
    {
        try {
            $diaryID = $request->diaryID;

            $deleteDiary = $this->delete($diaryID);

            if (!$deleteDiary) {
                return [
                    'status' => 'error',
                    'data' => [
                        'internalMessage' => 'No record found',
                        'code' => 404,
                    ]
                ];
            }

            return [
                'status' => 'success',
                'data' => [
                    'internalMessage' => 'deleted successfully',
                    'code' => 200,
                ]
            ];
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

    public function reaction($request)
    {
        try {
            $diaryID = $request->diaryID;
            $userID = Auth::id();

            $reactionObj = ReactionDiary::where([
                'user_id' => $userID,
                'diary_id' => $diaryID
            ])
                ->first();

            if (!$reactionObj) {
                ReactionDiary::create([
                    'user_id' => $userID,
                    'diary_id' => $diaryID
                ]);
            } else {
                $reactionObj->delete();
            };

            return [
                'status' => 'success'
            ];
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
