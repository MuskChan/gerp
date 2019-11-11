<?php
/**
 * @param string $msg
 * @param array  $data
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

/**
 * @param string $msg
 * @param array  $data
 * @param string $url
 * @return \Illuminate\Http\JsonResponse
 */
function failure($msg = 'failure', $data = [], $url = '')
{
    return response()->json([
        'code' => 0,
        'msg'  => $msg,
        'data' => $data,
        'url'  =>$url,
    ],200);
}

