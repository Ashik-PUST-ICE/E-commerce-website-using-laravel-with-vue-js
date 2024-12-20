<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        // Validate user input
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string',
        ]);

        // If validation fails
        if ($validation->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validation->errors()->first()
            ], 400);
        }

        // Attempt to authenticate user
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, false)) {
            // Check if the user has the admin role
            if (Auth::user()->hasRole('admin')) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Welcome, Admin!'
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }
    }
}
