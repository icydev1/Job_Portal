<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function paymentPage(){



        // Session::put(['balance'=>$balance]);

        return view('payment.stripePayment');

    }

    public function paymentSuccess(Request $request){

        // dd($request->all());

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Wallet::create ([
                "wallet_amount" => 100,
                "currency" => "inr",
                "user_id" => Auth::id(),
                "stripe_token_id" => $request->stripeToken,
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        return back();
    }


}
