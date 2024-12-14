<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ordersController extends Controller
{
    public function index ()
    {
        $orders = Order::all(); 
    return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');  // Return to the create order view
    }

    // Store a newly created order in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'order_number' => 'required|unique:orders,order_number',
            'customer_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            'order_date' => 'required|date',
        ]);

        // If validation fails, return with error messages
        if ($validator->fails()) {
            return redirect()->route('orders.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Create a new order
        Orders::create([
            'order_number' => $request->order_number,
            'customer_name' => $request->customer_name,
            'status' => $request->status,
            'total_amount' => $request->total_amount,
            'order_date' => $request->order_date,
        ]);

        // Redirect back with a success message
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    // Show the form for editing the specified order
    public function edit($id)
    {
        $order = Order::findOrFail($id);  // Fetch order by ID or fail if not found
        return view('admin.orders.edit', compact('order'));  // Return to the edit order view
    }

    public function show($id){

        $Order=Order::find($id);
        $billings=DB::table('order')->leftJoin('ortemitems','order.id','=','ortemitems.order_id')
        ->where('order.id',$id)
        ->select('order.*','ortemitems.*')->get();
        return view('admin.orders.show',compact('Order','billings'));
    }

    // Update the specified order in the database
    public function update(Request $request, $id)
    {
        // Validation
    //    $request->validate($request,[

    //    ]);

        
    //     // Find the order and update the details
        
    // //    $Order = Orders::findOrFail($id);
    //     $order->update([
    //         'order_number' => $request->order_number,
    //         'customer_name' => $request->customer_name,
    //         'status' => $request->status,
    //         'total_amount' => $request->total_amount,
    //         'order_date' => $request->order_date,
    //     ]);

    //     // Redirect back with a success message
    //     return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    

    // Remove the specified order from the database
}
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);  // Fetch the order by ID
        $order->delete();  // Delete the order

        // Redirect back with a success message
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}

