<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController
{
    private static $response = [ "status" => false, "message" => "invalid inputs", "responseData" => [], "errorData" => []];

    public static function loadUsers(Request $request){
        $rules = [
            // 'title' => 'bail|required|unique:posts|max:255|min:6',
            // 'body' => 'required',
        ];

        // Create a validator instance and validate the data
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            //set error into
            UserController::$response['errorData'] = $validator->errors();
        }else{
            $users = DB::select('select * from users');
            //set data
            UserController::$response['status'] = true;
            UserController::$response['message'] = "success";
            UserController::$response['responseData'] = $users;
        }

        return UserController::$response;
        return $users;
    }
}
