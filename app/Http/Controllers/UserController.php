<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function loadUsers(Request $request){
        var_export($request);
        $users = DB::select('select * from users');
        return $users;
    }
}
