<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
use \Illuminate\Http\Request;

$router->get('/', function (Request $request) use ($router) {
    return view('index', ['amount'=>$request->input('offsetamount')]);
});
$router->post('/auth-payment', 'PaymentController@paymentAuth');
