<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function register(Request $request)
    {
        // function getRole($role_as)
        // {
        //     //Admin -1 , HR- 2, Staff -3
        //     if ($role_as == 'Admin')
        //         return 1;
        //     elseif ($role_as == 'HR')
        //         return 2;
        //     return 3;
        // }

        // Validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Authenticate the user
        Auth::login($user);

        // Generate a personal access token
        $token = $user->createToken('registerToken');
        $accessToken = $token->plainTextToken;

        return response()->json(['status' => 'success', 'user' => $user->only('name', 'email'), 'token' => $accessToken], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the email exists in the database
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {

            return response()->json(['status' => 'error', 'errors' => 'invalid credentials'], 403);
        }

        // Generate a personal access token
        $token = $user->createToken('loginToken');
        $accessToken = $token->plainTextToken;

        // If both email and password are correct, generate an API token
        return response()->json(['status' => 'success', 'user' => $user->only('name', 'email'), 'token' => $accessToken], 200);
    }


    public function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();

        return response()->json(['status' => 'success', 'message' => 'logged out'], 200);
    }

    public function deactivate(Request $request)
    {

        $request->user()->tokens()->delete();
        optional(User::find($request->user()->id))->delete();

        if (User::find($request->user()->id)) {
            return response()->json(['status' => 'error', 'errors' => 'error with deactivation'], 500);
        }

        return response()->json(['status' => 'success', 'message' => 'deactivated'], 200);
    }
}
