<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse { 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required', 
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' =>  'Email atau Password salah',
            ]);
        }
    
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }
}
