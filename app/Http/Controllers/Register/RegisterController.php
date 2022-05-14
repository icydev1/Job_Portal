<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    public function registerUser(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $saveData = new User([

            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),

        ]);

        $saveData->save();

        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {

           return "login";

        }
        else
        {
             return "fail";

        }

    }



   public function logout()
    {

        Auth::logout();

        return "logout";

    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


// Google callback
public function loginWithGoogle()
{


    $user = Socialite::driver('google')->stateless()->user();

    $this->_registerOrLoginUser($user);

    return redirect()->route('JobPortal.Index');
}

// Google callback
public function loginWithFacebook()
{


    $user = Socialite::driver('facebook')->stateless()->user();

    $this->_registerOrLoginUser($user);

    return redirect()->route('JobPortal.Index');
}



protected function _registerOrLoginUser($data)
    {

        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->password = bcrypt('123456');
            $user->save();
        }

        Auth::login($user);
    }



    }


