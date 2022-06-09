<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class SocialController
{
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        $facebookUser = Socialite::driver('facebook')->stateless()->user();

        $user = User::updateOrCreate([
            'facebook_id' => $facebookUser->id,
        ], [
            'name'=>$facebookUser->name,
            'email'=>$facebookUser->email,
            'avatar'=>$facebookUser->avatar,
            'facebook_id'=>$facebookUser->id
        ]);

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name'=>$googleUser->name,
            'email'=>$googleUser->email,
            'avatar'=>$googleUser->avatar,
            'google_id'=>$googleUser->id
        ]);

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
