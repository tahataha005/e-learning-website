<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    public function courses(){
        return $this->belongsTo(Course::class,"course_id");
    } 

    public function submitted(){
        return $this->belongsToMany(Submitted::class,"assignment_id");
    } 

    protected $fillable = [
        'title',
        'content',
        'assignment',
        'course_id'
    ];
}
