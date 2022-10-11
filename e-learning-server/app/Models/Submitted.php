<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submitted extends Model
{
    use HasFactory;

    public function assignments(){
        return $this->belongsTo(Announcement::class,"assignment_id");
    } 

    public function users(){
        return $this->belongsTo(User::class,"student_id");
    } 

    protected $fillable = [
        'student_id',
        'assignment_id',
        'file_url'
    ];
}
