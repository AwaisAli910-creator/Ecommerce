<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Ordertracking;
use Illuminate\Http\Request;

class frontendordertrackingController extends Controller
{
     
public function index(Request $request)
    {
        // // Validate the incoming request
        // $request->validate([
        //     'track-number' => 'required|numeric' // Track number should be numeric
        // ]);

        // // Get the tracking number from the request
        // $abc = $request->get('track-number');

        // // Retrieve the order by matching customer_phone with the tracking number
        // $order = Ordertracking::where('customer_phone', $abc)->first();

        // // If order is found, show the details, else return a not found message
        // if ($order) {
        //     return view('ordertracking.index', compact('order'));
        // } else {
        //     return back()->withErrors(['track-number' => 'Order not found. Please check your tracking number.']);
        // }
    //     $order = null;

    // // Agar user ne tracking number ya phone number diya hai
    // if ($request->has('track-number')) {
    //     $trackNumber = $request->input('track-number');
        
    //     // Tracking number ya phone number se order find karen
    //     $order = Ordertracking::where('order_number', $trackNumber)
    //                           ->orWhere('customer_phone', $trackNumber)
    //                           ->first();

    //     // Agar order nahi mila to error return karen
    //     if (!$order) {
    //         return redirect()->route('ordertracking.index')->withErrors(['Tracking number or Phone number not found.']);
    //     }
    // }

    // // Order ko view ke sath return karen
    // return view('frontend.order_tracking.index', compact('order'));

    $order = null;

    // Agar user ne tracking number diya hai ya phone number diya hai
    if ($request->has('track-number') || $request->has('phone-number')) {
        $trackNumber = $request->input('track-number');
        $phoneNumber = $request->input('phone-number');
        
        // Debugging ke liye
        dd($trackNumber, $phoneNumber); // Ye line check karega ki inputs sahi aa rahe hain.

        // Agar tracking number diya gaya hai, toh usse search karo
        if ($trackNumber) {
            $order = Ordertracking::where('order_number', $trackNumber)->first();
        }

        // Agar phone number diya gaya hai, toh usse search karo
        if ($phoneNumber) {
            $order = Ordertracking::where('customer_phone', $phoneNumber)->first();
        }

        // Agar order nahi mila, toh error return karo
        if (!$order) {
            return redirect()->route('ordertracking.index')->withErrors(['Tracking number or Phone number not found.']);
        }
    }

    // Order ko view ke sath return karen
    return view('frontend.order_tracking.index', compact('order'));


    }

}
