<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)  {
        $providers = ['facebook', 'google'];

        if(!in_array($provider, $providers)){
            return redirect()->route('login')->with('error', 'Unknown social login provider');
        }
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        $userSocial = Socialite::driver($provider)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if($user) {
            auth()->login($user);
            return redirect('/dashboard');
        }else{
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'email_verified_at' => now(),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider
            ]);

            auth()->login($user);
            return redirect('/dashboard');
        }

    }



}
