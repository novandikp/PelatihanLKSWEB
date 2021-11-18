<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (auth()->user()->role == 'Publisher') {
                return redirect('/user');
            } else if (auth()->user()->role == 'Developer') {
                return redirect('/game');
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    //
    public function auth(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('/user');
            }
        }
        $error = new MessageBag(['error' => 'Email atau password salah']);
        return redirect('/login')->withErrors($error);
    }


    public function authApi(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return response([
                    'status' => 'success',
                    'message' => 'Login berhasil',
                    'data' => $user
                ]);
            }
        }
        return response([
            'status' => 'error',
            'message' => 'Email atau password salah'
        ], 401);
    }
}
