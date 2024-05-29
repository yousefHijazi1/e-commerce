<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller{

    public function register(Request $request){

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string', 'max:255','min:8',],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->toArray(),
                'code' => 400
            ]);
        }

        // If validation passes, create a new user

        $data = $validator->validated();

        $data['role'] = 'user'; // Set the role to 'user'
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user) {
            return response()->json([
                'message' => 'Registered Successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => 'Register Failed',
                'code' => 100
            ]);
        }
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'message' => 'Incorrect Email or Password',
                'code' => 400
            ]);
        }else{
            $user = $request->user();

            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
