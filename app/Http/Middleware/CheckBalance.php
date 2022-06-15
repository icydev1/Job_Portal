<?php

namespace App\Http\Middleware;

use App\Models\Wallet;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckBalance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $balance = checkBalance(); // I will make helper function for Checkblance

        $freeCredits = freePostJob(); // I will make helper function for Checkblance

        // dump($balance,$freeCredits);

       if($freeCredits > 0 || $balance >= 100){

        return $next($request);

       }else{

        return redirect()->route('JobPortal.PaymentPage');
       }

    }
}
