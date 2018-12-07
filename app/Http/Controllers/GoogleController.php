<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        $user_data = array(
            'name' => $user->name,
            'phone' => null,
            'email' => $user->email,
            'password' => null,
            'user_type'=>'patient',
            'age'=>null
        );

        $auth_user = User::firstOrCreate(['email'=>$user->email],$user_data);
        Auth()->login($auth_user);
        return redirect('home');
    }
}
