<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Core\Auth;
use App\Http\Controllers\Misc\General;
use App\Http\Controllers\Validator\AuthVal;

Route::prefix('auth')->group(function () {

    Route::post('/login', function (Request $request) {
        $response = General::$response;
        $response['message'] = 'invalid inputs';

        //run validation on inputs
        $error = AuthVal::login($request);

        if ($error['status']) {
            //if no error, pass to auth controller
            $response = Auth::login($request);
        } else {
            $response['errorData'] = $error['errors'];
        }
        
        return response($response);
    });
});