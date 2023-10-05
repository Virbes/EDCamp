<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class UserController
{
    public function login()
    {
        $data = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if (Auth::attempt($data)) {

            $logginData['token'] = Auth::user()->createToken('EDtoken')->accessToken;

            return response()->json([
                'message' => 'Bienvenido',
                'data' => $logginData
            ], 200);
        } else {

            return response()->json([
                'message' => 'Error en el login'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $loginData['token'] = $user->createToken('EDToken')->accessToken;

        return response()->json(['message' => 'Bienvenido nuevo usuario', 'data' => $loginData], 200);
    }
}
