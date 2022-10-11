<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class,"instructor_id");
    } 

    public function announcements(){
        return $this->belongsToMany(Announcement::class,"course_id");
    } 

    public function enrolled(){
        return $this->belongsToMany(Enrolled::class,"course_id");
    } 

    protected $fillable = [
        'crn',
        'name',
        'time',
        'instructor_id'
    ];
}
