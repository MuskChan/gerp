<?php
/**
 * @param string $msg
 * @param array
 * @param string $url
 * @return \Illuminate\Http\JsonResponse
 */
function success($msg = 'success', $data = [], $url = '')
{
    return response()->json([
        'code' => 1,
        'msg'  => $msg,
        'data' => $data,
        'url'  =>$url,
    ],200);
}

