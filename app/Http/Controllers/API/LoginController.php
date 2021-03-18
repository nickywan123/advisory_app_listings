<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $loginData = $request->validate([
          'email' => 'email|required',
          'password' => 'required'
        ]);
        
        if (!auth()->attempt($loginData)) {
          return response(['message' => 'Invalid Credentials']);
        }
       
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response([
            'status' => 200,
            'message' => 'Logged in',
            'result' => [
                'user_id' => auth()->user()->id,
                'token_type' => 'Bearer',
                'role_type' => auth()->user()->role_type,
                'access_token' => $accessToken,
                'expires_at' => auth()->user()->createToken('authToken')->token->expires_at
            ],
            ]);
      }
}
