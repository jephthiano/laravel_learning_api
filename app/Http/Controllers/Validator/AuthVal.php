<?php

namespace App\Http\Controllers\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Misc\General;

class AuthVal
{
    private static $response = [ "status" => false, "error" => []];

    public static function login(Request $request){
        $response = General::$response;

        $rules = [
            'login_id' => 'required',
            'password' => 'required',
        ];

        // Create a validator instance and validate the data
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            //set error into
            $response['errors'] = $validator->errors();
        }else{
            $response['status'] = true;
        }

        return $response;
    }
}
