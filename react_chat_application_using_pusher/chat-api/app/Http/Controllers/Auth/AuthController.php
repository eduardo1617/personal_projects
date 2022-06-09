<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate
        (
            [
                'email' => ['required', 'email'],
                'name' => ['required'],
                'password' => ['required']
            ]
        );

        $user = User::create(
            array_merge($data, ['password' => bcrypt($data['password'])])
        );
        $token = $user->createToken('chat-app')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }

    public function login(Request $request)
    {
        $data = $request->validate
        (
            [
                'email' => ['required', 'email', Rule::exists('users')],
                'password' => ['required']
            ]
        );

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages(
                [
                    'email' => ['The provided credentials are incorrect.'],
                ]);
        }

        $token = $user->createToken('chat-app')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}
