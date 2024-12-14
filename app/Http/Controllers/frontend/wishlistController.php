<?php

namespace App\Http\Controllers\frontend;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class wishlistController extends Controller
{
    public function index()
    {
        $wishlistitems = Wishlist::where('user_id', Auth::id())->with('product')->get();
        return view('frontend.wishlist.index', compact('wishlistitems'));
    }

    public function add(Request $request, $id)
    {

        if(Auth::id()){

            $user=Auth::user();
            $Product=Product::find($id);

            $wishlist = new Wishlist;
            $wishlist->user_id = $user->id;
            $wishlist->product_id = $Product->id;
            $wishlist->save();

            return redirect()->route('wishlist.index');


            // dd($wishlist);

        }
        else{
            return redirect()->route('login');

        }
        // else{
        //     return redirect()->route('login');
        // }

       

        // return redirect()->back()->with('success', 'Product added to wishlist!');
    }

    public function remove($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist!');
    }

    public function clear()
    {
        Wishlist::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Wishlist cleared!');
    }

}
