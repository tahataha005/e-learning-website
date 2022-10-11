<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Announcement;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //Function that gets all info about the inputed request
    function getRecords($records){
        if($records == "courses"){
            $courses = Course::select("*")->get();            
            return response()->json(["records"=>$courses]);
        }
        if($records == "instructors"){
            $instructors = User::select("*")->where("user_type",2)->get();            
            return response()->json(["records"=>$instructors]);
        }
        if($records == "students"){
            $students = User::select("*")->where("user_type",1)->get();            
            return response()->json(["records"=>$students]);
        }

        return response()->json(["status"=>"Not valid request"]);
    }

    function addUser(Request $request){

        $fetch_username = User::where("username",$request->username)->get();

        if($fetch_username->isEmpty()){

            $field = $request->field;

            if($field == "instructor"){

                $user = User::create([
                    "username"=>$request->username,
                    "password"=> Hash::make($request->password),
                    "user_type"=>2,
                ]);
    
                return response()->json([
                    "username"=>$request->username,
                    "status"=>"instructor saved successful"
                ]);
            }
        }

        return response()->json([
            "username"=>$request->username,
            "status"=>"Username already exists"
        ]);
    }
}
