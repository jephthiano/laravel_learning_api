<?php

namespace App\Http\Controllers\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthVal
{
    private static $response = [ "status" => false, "error" => []];

    public static function login(Request $request){
        $rules = [
            'login_id' => 'required',
            'password' => 'required',
        ];

        // Create a validator instance and validate the data
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            //set error into
            AuthVal::$response['error'] = $validator->errors();
        }else{
            AuthVal::$response['status'] = true;
        }

        return AuthVal::$response;
    }
}
