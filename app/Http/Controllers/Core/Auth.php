<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Misc\General;

class Auth
{
    private static $response = [ "status" => false, "message" => "invalid inputs", "responseData" => [], "errorData" => []];

    public static function login(Request $request){
        $response = General::$response;
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
            $response['status'] = true;
            $response['message'] = "success";
            $response['responseData'] = $users;
        // }
        return $response;
    }
}
