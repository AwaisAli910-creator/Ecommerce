<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function sidebar()
    {
        // Sidebar ke liye products le lo
        $products = Product::all(); // Jaisa zarurat ho (jaise pagination ya filtering)
        // dd($products);
        return view('frontend/new_arrival/productsidebar', compact('products')); // Apne actual view path ko yahan adjust karein
    }
}
