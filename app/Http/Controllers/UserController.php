<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private static $response = [ "status" => false, "message" => "invalid inputs", "responseData" => [], "errorData" => []];

    public static function loadUsers(Request $request){
        $rules = [
            'title' => 'bail|required|unique:posts|max:255|min:6',
            'body' => 'required',
        ];

        // Create a validator instance and validate the data
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            //set error into
            UserController::$response['errorData'] = $validator->errors();

            return UserController::$response;
            // [
            //     "status" => false,
            //     "message" => "invalid inputs",
            //     "responseData" => [],
            //     "errorData" => $error
            // ];
        }

        $users = DB::select('select * from users');
        return $users;
    }
}
