<?php

namespace Haris\Helpers\Response;

use Illuminate\Http\Request;

/**
 * Class WebResponse
 *
 * @package Harisr\Helpers\Response
 *
 */
class WebResponse extends BaseResponse
{

    /**
     * @param $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     *
     */
    public function error($message, $redirection=null)
    {
        $request=Request::capture();
        if ($request->ajax()) {
            return response([
                'errors' => [
                    'custom_error' => $message,
                ],
                'redirection'=>$redirection
            ], 422);
        }
        return redirect()->back()->withErrors(['custom_error' => $message]);
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
