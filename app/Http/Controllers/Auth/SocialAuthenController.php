<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthenController extends Controller
{
    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            if (!empty($user->getEmail())) {
                $saveUser = User::updateOrCreate([
                    'email' => $user->getEmail(),
                ],[
                    'facebook_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            } else {
                $saveUser = User::updateOrCreate([
                    'facebook_id' => $user->getId(),
                ],[
                    'facebook_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' =>  $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            }


            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        } catch (\Exception $e) {
            \logger($e->getMessage());
            return redirect()->route('home');
        }
    }

    public function loginUsingGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            }else{
                $newUser = User::updateOrCreate(
                    [
                        'email' => $user->email
                    ],
                    [
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => encrypt('123456dumMyfarm')
                    ]
                );
                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            logger($e->getMessage());
            return redirect()->route('home');
        }
    }
}
