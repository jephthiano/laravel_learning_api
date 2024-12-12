<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

use App\Http\Controllers\Core\Auth;

Route::prefix('auth')->group(function () {
    Route::post('/login', function (Request $request){
        $response = Auth::login($request);
        return response($response);
    });
});


// Route::middleware([EnsureTokenIsValid::class])->group(function () {

//     Route::post('/login', function (Request $request){
//         $response = Auth::login($request);
//         return response($response);
//     });
// });


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
