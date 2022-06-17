<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SignUPController extends Controller
{



public function loginUser(Request $request){



    $request->validate([

        'login_email' => 'required',
        'login_password' => 'required',

    ]);

    $email = $request->login_email;
    $pass  = $request->login_password;

    if (auth()->attempt(array('email' => $email, 'password' => $pass)))
    {
        return response()->json([ [1] ]);
    }
    else
     {
        return response()->json([ [2] ]);
     }
}



}
