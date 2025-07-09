<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

if (! function_exists('successResponse')) {
    /**
     * Global function to return success json response to the client side.
     *
     * @param string $message
     * @param mixed $data
     * @param int $status
     *
     * @return JsonResponse
     */
    function successResponse(string $message, mixed $data = [], int $status = 200): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'message' => $message,
                'data' => $data,
                'status' => $status,
            ],
            $status
        );
    }
}

if (! function_exists('errorResponse')) {
    /**
     * Global function to return error json response to the client side.
     *
     * @param string $message
     * @param int $status
     * @param mixed $data
     *
     * @return HttpResponseException
     */
    function errorResponse(string $message, int $status = 400, mixed $data = []): HttpResponseException
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'success' => false,
                    'message' => $message,
                    'status' => $status,
                    'data' => $data,
                ],
                $status
            )
        );
    }
}
