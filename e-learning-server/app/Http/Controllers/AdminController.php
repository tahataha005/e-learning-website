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

    //Adding a specified field
    function addField(Request $request){
        
        //Instructor or student check
        if($request->username){
            $fetch_username = User::where("username",$request->username)->get();

            //If not exists allow adding
            if($fetch_username->isEmpty()){
                $field = $request->field;
                
                //Adding an instructor
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

                //Adding a student                
                if($field == "student"){
                    $user = User::create([
                        "username"=>$request->username,
                        "password"=> Hash::make($request->password),
                        "user_type"=>1,
                    ]);
                
                    return response()->json([
                        "username"=>$request->username,
                        "status"=>"student saved successful"
                    ]);
                }
            }

            //User exists
            return response()->json([
                "status"=>"user already exists"
            ]);
        }

        //Course check
        if($request->course_name){

            $fetch_course = Course::where("name",$request->course_name)->get();

            //Check if course doesn't exist
            if($fetch_course->isEmpty()){

                //check for instructor name
                $get_instructor_id = User::select("id")->where("username",$request->instructor_username)->get();

                if($get_instructor_id->isEmpty()){
                    return response()->json(["status"=>"instructor not found"]);
                }

                //If not
                $course = Course::create([
                    "crn"=>$request->crn,
                    "name"=> $request->name,
                    "time"=>$request->time,
                    "instructor_id"=>$get_instructor_id[0]->id
                ]);
    
                return response()->json([
                    "username"=>$request->username,
                    "status"=>"course saved successful"
                ]);
            }

            //If course exists
            return response()->json([
                "status"=>"course already exists"
            ]);
        }

        //If no fild created
        return response()->json([
            "status"=>"not a valid field"
        ]);       
    }

    //Delete field
    function deleteField(Request $request){

        //Check if deleting user
        if($request->username){
            User::where("username",$request->username)->delete();
            
            return response()->json([
                "status"=>"user deleted successfully"
            ]); 
        }

        return response()->json([
            "status"=>"nothing deleted, check inputs"
        ]); 
    }

}