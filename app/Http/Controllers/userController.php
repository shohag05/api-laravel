<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class userController extends Controller
{
    function userRegistration(Request $request){
        try {
            User::create([
                'name' => $request -> input('name'),
                'email' => $request -> input('email'),
                'password' => $request -> input('password'),
                'role' => $request -> input('role'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ],200);

        } catch (Exception $e) {
            return response() -> json([
                'status' => 'failed',
                'message' => 'User Registration Failed'
            ],500);
        }
    }

    public function allUsers()
    {
        try {
            $users = User::all();
            
            return response()->json([
                'status' => 'success',
                'users' => $users
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to fetch users'
            ], 500);
        }
    }
}
