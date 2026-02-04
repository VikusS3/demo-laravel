<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function tokenLogin(Request $request)
    {
        $token = $request->credential;

        $googleUser = Http::get(
            'https://oauth2.googleapis.com/tokeninfo?id_token=' . $token
        )->json();

        $user = User::where('email', $googleUser['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser['name'],
                'email' => $googleUser['email'],
                'password' => bcrypt(Str::random(16)),
            ]);
        }

        Auth::login($user);

        return response()->json(['success' => true]);
    }
}
