<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Auth
{
    private static $response = [ "status" => false, "message" => "invalid inputs", "responseData" => [], "errorData" => []];

    public static function login(Request $request){
        // $rules = [
        //     'login_id' => 'required',
        //     'password' => 'required',
        // ];

        // // Create a validator instance and validate the data
        // $validator = Validator::make($request->all(), $rules);

        // // Check if validation fails
        // if ($validator->fails()) {
        //     //set error into
        //     Auth::$response['errorData'] = $validator->errors();
        // }else{
            $users = DB::select('select * from users');
            //set data
            Auth::$response['status'] = true;
            Auth::$response['message'] = "success";
            Auth::$response['responseData'] = $users;
        // }
        return Auth::$response;
    }
}
