
<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class BaseAPIController extends Controller
{
    public function __construct()
    {
    }
    
    public function responseSuccess($data = [], $message, $statusCode = 200)
    {
        $response = [
            'data' => $data,
            'message' => $message
        ];
        return response()->json($response, $statusCode);
    }

    public function responseError($statusCode, $message = [])
    {
        $response = [
            'message' => $message
        ];
        return response()->json($response, $statusCode);
    }

    public function response404()
    {
        return abort(Response::HTTP_NOT_FOUND);
    }
}

