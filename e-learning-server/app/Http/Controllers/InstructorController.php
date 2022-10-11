<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Announcement;


class InstructorController extends Controller
{
    function addAnnouncement(Request $request){
        $announcement = Announcement::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "assignment"=>$request->assignment,
            "course_id"=>$request->course_id,
        ]);

        return response()->json([
            "announcement"=>$announcement,
            "status"=>"announcement posted"
        ]);
    }
}
