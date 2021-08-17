<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    //UserRegister
    public function register(Request $request){

        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone'=> 'required',
            'password' => 'required|string|min:6|max:32|confirmed',
            'device_name' => 'required',
            'agree' => 'accepted'

        ]);

        if($validate->fails()){
            return response()->json([
                'type' => "missing",
                'message' => $validate->errors()->first(),
                'result' => null
            ]);
        }

        $userAttr = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            ];

        //Now return the array($userAttr)

        $user = User::create($userAttr);
        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'type' => $user ? "success" : "fail",
            'messages' => $user ? 'User Created Successfully ' : 'Fail to create',
            'result'=>$user,
            'token'=>$token

        ],200);

    }
        //Logout

    public function logout(Request $request){
        $revoke = $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status_code' => 200,
            'success' => $revoke
        ]);


    }

    public function user(Request $request){
        return [
            'user' => $request->user()
        ];
    }

    //Login

    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'type' => "missing",
                'messages' => $validate->errors(),
                'token' =>null,
                'success' => false
            ],200);

        }

        $user = User::where('email',$request->email)->first();

        //if user input pass and database stored pass doesn't match
        if(!$user || !Hash::check($request->password, $user->password)){

            return response()->json([
                'type' => "incorrect",
                'messages' => 'The credentials was incorrect',
                'token' => null,
                'success' => false
            ],200);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'type' => 'success',
            'messages' => 'User Login Successfully',
            'token' => $token,
            'success' => true
        ],200);
    }
}
