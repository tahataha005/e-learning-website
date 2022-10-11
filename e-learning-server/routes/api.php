<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Route::group(["prefix"=>"authentication"],function(){
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
});

Route::get("/user/{id}",[UserController::class,"getUser"]);
Route::get("/course/{id}",[UserController::class,"getCourse"]);


Route::group(["prefix"=>"admin"],function(){
    Route::get("/{records}",[AdminController::class,"getRecords"]);
    Route::post("/add_field",[AdminController::class,"addField"]);
    Route::post("/delete_field",[AdminController::class,"deleteField"]);
});

Route::group(["prefix"=>"instructor"],function(){
    
});

Route::group(['middleware' => 'api'], function($router) {

});

