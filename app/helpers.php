<?php

use App\Models\User;
use App\Models\Wallet;

use Illuminate\Support\Facades\Auth;

function checkBalance () {

      $balance = 0;

      if(Wallet::where('user_id', Auth::id())->exists()){
        $amount = Wallet::where('user_id', Auth::id())->first();

        if(!empty($amount))
        {
            $balance =  $amount->wallet_amount;
        }
        else{
            $balance = 0;
        }
      }

        return $balance;

}

function freePostJob(){

    $freeCredits = 0;

    if(User::where('id', Auth::id())->exists()){
    $amount = User::where('id',Auth::id())->first()->toArray();


    if(!empty($amount)){

        $freeCredits = $amount['quantity'];

    }
    }


    return $freeCredits;

}
