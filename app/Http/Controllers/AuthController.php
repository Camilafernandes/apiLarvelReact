<?php
namespace App\Http\Controllers;

use Hash;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function authenticate(Request $request) {
      $credentials = $request->only('email', 'password');

      $users = User::where('email', $credentials['email'])->first();

      if(!$users) {
        return response()->json([
          'error' => 'Invalid credentials'
        ], 401);
      }

      if (!Hash::check($credentials['password'], $users->password)) {
          return response()->json([
            'error' => 'Invalid credentials'
          ], 401);
      }

      $token = JWTAuth::fromUser($users);

      $objectToken = JWTAuth::setToken($token);
      //$expiration = JWTAuth::decode($objectToken->getToken())->get('exp');

      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
      ]);
    }
}