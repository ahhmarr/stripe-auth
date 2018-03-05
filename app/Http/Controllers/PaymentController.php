<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Token;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_TEST_SECRET'));
    }
    public function paymentAuth(Request $req)
    {
        $flag=true;
        try {
            $token=Token::create(['card'=>[
            "number" => $req->input('card-no'),
            "exp_month" => $req->mm,
            "exp_year" => (2000+$req->yy),
            "cvc" => $req->cvv
        ]]);
            $charge=Charge::create([
            "card"=>$token,
            "amount"=>$req->amount*100,
            "currency"=>"usd",
            "description"=>"charged client @".time()
        ]);
        } catch (\Exception $e) {
            // dd($e);
            $flag=false;
        }
        return view('payment-status', compact('flag'));
    }

    //
}
