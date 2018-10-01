<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Mail;
use Session;

class CheckoutController extends Controller
{
    public function index(){
        if(Cart::content()->count() == 0){
            Session::flash('info', 'Your cart is still empty, do some shopping');
            return redirect()->back();
        }

        return view('checkout');
    }

    public function pay(){
        Stripe::setApiKey("sk_test_SzyaRFlXrQzICcqL4DtNv7Fy");

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Laravel E-commerce selling books',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Purchase successfull, wait for our email');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessfull);

        return redirect('/');
    }
}
