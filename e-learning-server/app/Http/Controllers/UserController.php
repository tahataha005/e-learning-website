<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Announcement;

class UserController extends Controller
{
    //Function that gets user info from id
    function getUser($user_id){
        $user=User::find($user_id);

        return response()->json(["user"=>$user]);
    }

    function getCourse($course_id){
        $course=Course::find($course_id);
        $instructor=User::select("username")->where("id",$course->instructor_id)->get();

        $announcements=Announcement::
        where('course_id',$course_id)
        ->get();

        return response()->json([
            "course"=>$course,
            "instructor"=>$instructor,
            "announcements"=>$announcements
        ]);
    }
    
}
