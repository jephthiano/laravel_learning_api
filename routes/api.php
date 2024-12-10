<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\UserController;


Route::middleware([EnsureTokenIsValid::class])->group(function () {

    Route::get('/test/{id?}', function (Request $request, ?string $id = '0'){
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
