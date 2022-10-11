<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\UserController;


Route::group(["prefix"=>"authentication"],function(){
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
});

Route::get("/user/{id}",[UserController::class,"getUser"]);


Route::group(['middleware' => 'api'], function($router) {

});

