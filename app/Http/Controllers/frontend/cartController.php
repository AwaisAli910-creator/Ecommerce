<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function index()
    {
        $Carts = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart.index', compact('Carts'));
    }

    public function add(Request $request, $id)
    {
        
    if (Auth::check()) {
        $user = Auth::user();
        $product = Product::find($id);

        // Check if product exists
        if (!$product) {
            return redirect()->route('cart.index')->with('error', 'Product not found.');
        }

        // Create a new Cart item
        $Cart = new Cart(); // Assuming you have a CartItem model
        $Cart->user_id = $user->id;
        $Cart->product_id = $product->id;
        $Cart->name = $request->input('name'); // If you want to collect this
        $Cart->phone = $request->input('phone'); // If you want to collect this
        $Cart->address = $request->input('address'); // If you want to collect this
        $Cart->prod_title = $product->prod; // Assuming the product has a title
        $Cart->qty = $request->input('qty', 1); // Default quantity to 1 if not provided
        $Cart->prod_img = $product->p_img; // Assuming the product has an image field
        $Cart->price = $product->prod_price; // Assuming the product has a price field
        $Cart->total = $Cart->price * $Cart->qty; // Calculate total
        $Cart->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    } else {
        return redirect()->route('login');
    }
}

    public function destroy($id)
    {
        Cart::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
}
