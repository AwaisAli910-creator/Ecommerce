<?php

namespace App\Http\Controllers\frontend;

use App\Models\Bestsale;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Ordertracking;
use App\Models\Product;
use App\Models\slider;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
  public function home ()
  {
    $categories=Category::all();
    $products=Product::all();
    $sliders=slider::all();
    $wishlistitems=Wishlist::all();
    $Carts=Cart::all();
    $bestsales=Bestsale::all();
    $order=Ordertracking::all();

     return view ('frontend.home',compact('categories','products','sliders','wishlistitems','Carts','bestsales','order'));
  }
}
