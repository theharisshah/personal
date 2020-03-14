<?php

namespace Haris\Helpers\Response;


/**
 * Class AdminResponse
 *
 * @package Haris\Helpers\Response
 *
 */
class AdminResponse extends BaseResponse
{

    /**
     * @param $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     *
     */
    public function error($message)
    {
        return response(['custom_error' => $message,'message'=> $message], 422);
    }

    /**
     * @param string $message
     *
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function success($message='')
    {
        return response()->json($message);
    }
}