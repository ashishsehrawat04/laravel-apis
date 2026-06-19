<?php

namespace App\Helpers;

class ResponseHelper{


   public static function successRes(bool $status = true,string $message = '', mixed $data,int $code = 200) {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    public static function errorRes(string $message = 'Something went wrong',string $errors ,int $code = 500) {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }
    
}
