<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\AppUser;
use Illuminate\Support\Str;
class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();

        $finduser = AppUser::where('email', $user->email)->first();

        if($finduser){
            $token = Str::random(200);
            $finduser->update(['token' => $token]);
            return redirect('http://localhost:3000/auth?token='.$token);
        }else{
            $newUser = AppUser::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'token' => Str::random(200),
            ]);
            return redirect('http://localhost:3000/auth?token='.$newUser->token);

        }
    }
}
