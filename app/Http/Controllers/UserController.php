<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function loadUsers(){
        $users = DB::select('select * from users');
        return $users;
    }
}
