<?php

namespace App\Http\Controllers;


use App\User;
use Socialite;

class SocialController extends Controller
{
    //
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider){
        $socialUser = Socialite::driver($provider)->stateless()->user();
        $user = User::where('provider_id',$socialUser->getId())->first();
        if(!$user){
            User::create([
                'name'=>$socialUser->getName(),
                'email'=>$socialUser->getEmail(),
                'avatar'=>$socialUser->getAvatar(),
                'provider_id'=>$socialUser->getId()
            ]);
            $user = User::where('provider_id',$socialUser->getId())->first();
        }
        auth()->login($user);
        return redirect()->to('/home/');
    }
}
