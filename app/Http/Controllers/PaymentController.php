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
        // dd($req->all());
        $flag=true;
        $amount="$ ".$req->amount;
        try {
            $token=Token::create(['card'=>[
            "number" => $req->input('card-no'),
            "exp_month" => $req->input('mm'),
            "exp_year" => (2000+$req->input('yy')),
            "cvc" => $req->input('cvv')
        ]]);
            $charge=Charge::create([
            "card"=>$token,
            "amount"=>$req->input('amount')*100,
            "currency"=>"usd",
            "description"=>"charged client @".time(),
            "receipt_email"=>$req->email
        ]);
        } catch (\Exception $e) {
            // dd($e);
            $flag=false;
        }
        return view('payment-status', compact('flag', 'amount'));
    }

    //
}
