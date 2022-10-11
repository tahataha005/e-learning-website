<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JWTController extends Controller
{


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:2|max:100',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'user_type' => $request->user_type

            ]);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

 
    public function login(Request $request){
        
        $user = User::where("username",$request->username)->get();
        if($user->isEmpty()){
            return reposnse()-json(["status"=>"not a valid username"]);
        }
        if(Hash::make($user->password) == $request->password){
            return reposnse()-json(["status"=>"success"]);
        }
        return reposnse()-json(["status"=>"wrong password"]);
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    public function profile()
    {
        return response()->json(auth()->user());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}