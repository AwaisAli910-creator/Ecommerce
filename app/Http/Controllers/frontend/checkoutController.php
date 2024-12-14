<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order; // Assuming you have an Order model
use App\Models\Orderitems;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class checkoutController extends Controller
{

    

    public function index()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $orders = Cart::where('user_id', $user->id)->get();
            $totalPrice = Cart::sum('total');
        }

        return view('frontend.checkout.index', compact('orders','totalPrice'));
        
    }

    public function store(Request $request)
    {
        
 // Check if user is authenticated
 if (Auth::id()) {
    $user = Auth::user();

    // Create the order
    $Order = Order::create([
        'order_number' => 'ORD-' . strtoupper(substr(bin2hex(random_bytes(5)), 0, 10)),
        'cus_fname' => $request->get('fname'),
        'cus_lname' => $request->get('lname'),
        'customer_email' => $request->get('email'),
        'customer_phone' => $request->get('phone'),
        'customer_address' => $request->get('address'),
        'order_date' => now(),
        'total_amount' => $request->get('totalAmount'),
        'payment_method' => $request->get('payment_method'),
    ]);

    // Add products to the order
    foreach ($request->prod as $key => $productName) {
        $qty = $request->qty[$key];
        $price = $request->price[$key];
        $totalPrice = $qty * $price;

        Orderitems::create([
            'order_id' => $Order->id,
            'product_name' => $productName,
            'quantity' => $qty,
            'product_price' => $price,
            'total_price' => $totalPrice,
        ]);
    }


    if ($request->get('payment_method') == 'DirectBankTransfer' || $request->get('payment_method') == 'DebitCardsorPaypal') {

        return $this->createCheckoutSession($request);
    } elseif ($request->get('payment_method') == 'CashonDelivery') {

        // Store a session message for success
        session()->flash('status', 'Your order has been placed successfully!');

        // Redirect to order success page
        return redirect()->route('order_success');
        // return redirect()->route('frontend.checkout.order_success')->with('message', 'Your order has been placed. Please pay on delivery.');
    }
} else {
    // Handle case where user is not authenticated
    return redirect()->route('login')->with('error', 'Please login to place an order.');
}
}

public function createCheckoutSession(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));

        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'pkr',
                        'product_data' => [
                            'name' => 'name',
                        ],
                        'unit_amount' => $request->get('totalAmount')*100,
                        'tax_behavior' => 'exclusive',
                    ],
                    'quantity' => 1,
                ],
            ],
            // 'automatic_tax' => ['enabled' => true],
            'mode' => 'payment',
          'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'),
        ]);

        // dd($response); // Dump the response to see the result
        if(isset($response->id) && $response->id != ''){
            return redirect($response->url);
        }
        else{
            return redirect()->route('cancel');
        }
    }

public function orderSuccess()
{
    // Get the authenticated user
    $user = Auth::user();

    // Fetch the latest order for the logged-in user
    $order = Order::where('customer_email', $user->email)->orderBy('created_at', 'desc')->first();

    // Check if order exists
    if ($order) {
        // Fetch all the order items related to the order
        $orderItems = Orderitems::where('order_id', $order->id)->get();
        $totalPrice = $order->total_amount;  // Get total amount from the order

        // Return view with the order and order items
        return view('frontend.checkout.order_success', compact('order', 'orderItems', 'totalPrice'));
    } else {
        // If no order exists, redirect with an error message
        return redirect()->route('home')->with('error', 'No order found.');
    }


// public function orderSuccess()
// {
//     return view('frontend.checkout.order_success')->with('status', 'Order completed successfully');
// }

// public function placeOrder(Request $request)
// {
//     // Order process logic yahan likhen

//     // Jab order successfully place ho jaye, to user ko success page pe redirect karen
//     return redirect()->route('order_success');
// }
}
}