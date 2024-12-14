<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class orderontroller extends Controller
{
    public function confirmation($id)
{
    $order = Order::findOrFail($id);
    return view('frontend.order-confirmation', compact('order'));
}
    // public function store(Request $request)
    // {
    //     // Validate request data
    //     $request->validate([
    //         'name' => 'required',
    //         'address' => 'required',
    //         'phone' => 'required',
    //     ]);

    //     // Logic to save the order, process payment, etc.
    //     // Clear the cart after placing the order
    //     Cart::where('user_id', Auth::id())->delete();

    //     return redirect()->route('checkout.index')->with('success', 'Order placed successfully!');
    // }
//     public function store(Request $request)
// {
//     $request->validate([
//         'fname' => 'required|string|max:255',
//         'lname' => 'required|string|max:255',
//         'email' => 'required|email',
//         'phone' => 'required|string',
//         'country' => 'required|string',
//         'address' => 'required|string',
//         'city' => 'required|string',
//         'postcode' => 'required|string',
//         'payment_method' => 'required|string',
//     ]);

//     $order = new Order();
//     $order->user_id = Auth::id();
//     $order->first_name = $request->fname;
//     $order->last_name = $request->lname;
//     $order->email = $request->email;
//     $order->phone = $request->phone;
//     $order->country = $request->country;
//     $order->address = $request->address;
//     $order->city = $request->city;
//     $order->postcode = $request->postcode;
//     $order->payment_method = $request->payment_method;
//     $order->total = Cart::where('user_id', Auth::id())->sum('total'); // Total from cart
//     $order->save();

//     // Optionally, clear the cart after order is placed
//     Cart::where('user_id', Auth::id())->delete();

//     return redirect()->route('checkout.success')->with('success', 'Order placed successfully!');
// }
}
