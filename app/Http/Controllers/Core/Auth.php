<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Misc\General;

class Auth
{
    private static $response = ["status" => false, "message" => "invalid inputs", "responseData" => [], "errorData" => []];

    public static function login(Request $request){
        $response = General::$response;

        try {

            $users = DB::select('select * from users');
            //set data
            $response['status'] = true;
            $response['message'] = "success";
            $response['responseData'] = $users;
        } catch (\Exception $e) {
            Log::error('Error occurred in store method: ' . $e->getMessage(), ['exception' => $e]);
        }

        return $response;
    }
}
