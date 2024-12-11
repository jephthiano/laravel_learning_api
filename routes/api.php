<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\UserController;


Route::middleware([EnsureTokenIsValid::class])->group(function () {

    Route::get('/test', function (Request $request){
        // $name = $request->cookie();
        // var_export($name);

        $response = UserController::loadUsers($request);
        return response($response);
    });

    Route::post('/login', function (Request $request){
        $data = UserController::loadUsers();
        return [
            "status" => true,
            "message" => "success",
            "responseData" => $data,
        ];
    });
});

Route::fallback(function () {
    return [
        "status" => false,
        "message" => "invalid request",
    ];

});


// Route::get('/user', function (Request $request) {
//     var_export('working');return;
//     // return $request->user();
// })->middleware('auth:sanctum');
