<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function getUser($id){
        $user=User::find($id);

        return response()->json(["user"=>$user]);
    }
}
