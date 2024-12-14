<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class frontendstripeController extends Controller
{
    

    public function success (Request $request)
    {
       if (isset($request->session_id)){
           return redirect()->route('order_success');
 

           $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
           $stripe->checkout->sessions->create->retrive($request->session_id);

           $payment = new Payment();
           $payment->payment_id = $response->id;
           $payment->product_name = session();
       } else {
        return redirect()->route('cancel');
       }
    }

    public function cancel ()
    {
        return "Payment is canceled";
    }
}
