<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiBaseController extends Controller
{
    /**
     * To handle success response
     * @param $data
     * @param $code
     * @param $withDataKey
     * @return JsonResponse
     */
    public function successResponse($data = [], $code = Response::HTTP_OK, $withDataKey = true, array $inJson = null): JsonResponse
    {
        $json = [
            'success' => true,
            'code' => (int)$code
        ];
        $withDataKey ? $json['data'] = $data : array_push($json, $data);

        if ($inJson) {
            $json = array_slice($json, 0, 2, true) +
                $inJson +
                array_slice($json, 2, count($json) - 1, true);
        }

        return response()->json($json, (int)$code);
    }

    /**
     * To handle error response
     * @param $message
     * @param $code
     * @return JsonResponse
     */
    public function errorResponse($message = [], $code = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'success' => false,
            'code' => (int)$code,
            'message' => $message
        ], (int)$code);
    }
}
