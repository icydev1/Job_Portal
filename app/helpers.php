<?php

use App\Models\Wallet;

use Illuminate\Support\Facades\Auth;

function checkBalance () {

        $amount = Wallet::where('user_id',Auth::id())->first();

        if(!empty($amount))
        {
            $balance =  $amount->wallet_amount;
        }
        else{
            $balance = 0;
        }

        return $balance;

}
