<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

}
