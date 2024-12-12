<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Core\Auth;
use App\Http\Controllers\Validator\AuthVal;

Route::prefix('auth')->group(function () {

    Route::post('/login', function (Request $request){
        $error = AuthVal::login($request);

        var_export($error);
exit;
        $response = Auth::login($request);
        return response($response);
    });

});
