<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    
    public function userTypes(){
        return $this->belongsTo(User_type::class,"user_type");
    } 

    public function courses(){
        return $this->belongsToMany(Course::class,"instructor_id");
    } 

    public function enrolled(){
        return $this->belongsToMany(Enrolled::class,"student_id");
    } 

    public function submitted(){
        return $this->belongsToMany(Submitted::class,"student_id");
    } 

    protected $fillable = [
        'username',
        'password',
        'user_type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'username_verified_at' => 'datetime',
    ];
}
