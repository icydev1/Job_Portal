<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerUser(Request $request){

        // dd($request->all());

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $saveData = new User([

            'name' => $name,
            'email' => $email,
            'password' => $password,

        ]);

        $saveData->save();

        return back();

    }
}
