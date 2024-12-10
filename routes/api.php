<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\UserController;


Route::middleware([EnsureTokenIsValid::class])->group(function () {

    Route::get('/test', function (Request $request){
        $name = $request->input('name');
        var_export($request->ip()   );

        $data = UserController::loadUsers();
        return [
            "status" => true,
            "message" => "success",
            "responseData" => $data,
        ];
    });

    Route::post('/test', function (Request $request){
        $name = $request->input('name');
        var_export($name);

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
