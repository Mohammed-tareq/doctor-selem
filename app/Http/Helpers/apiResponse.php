<?php

if (!function_exists('apiResponse')) {


    function apiResponse($status, $message, $data = null)
    {
        $result = [
            'status' => $status,
            'message' => $message
        ];

        if ($data !== null) {
            $result['data'] = $data;
        }

        return response()->json($result, $status);
    }
}
