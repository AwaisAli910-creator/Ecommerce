<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Color;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $colors=Color::all();
        $products=Product::orderby('id', 'desc')->paginate(10);
        return view('admin.products.index')->with(compact('products','colors'));
        

    }

   public function create(){
    $colors=Color::all();

    return view('admin.products.add',compact('colors'));
   } 

   public function store(Request $request)
   {
    $this->validate($request, [
        'date' => 'required',
        'category_id' => 'required',
        'prod' => 'required',
        // 'p_img' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        'prod_price' => 'required',
        // 'selling_price' => 'required',
        'discount_persent' => 'required',
        'stock' => 'required',
        'model' => 'required',
        'delivery' => 'required',
        'size' => 'required',
        'slug' => 'required',
    ]);

    
    // Handle the image upload
    if (request()->hasFile('p_img')) {
        $file = request()->file('p_img');
        $filename = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/products_img'), $filename);
    } else {
        $filename = 'Image will be here';
    }
    $prod_price=$request->get('prod_price');
    $selling_price=$request->get('discount_persent');
    $discount=($selling_price * $prod_price) / 100;
    $rate= $prod_price- $discount;

    
    Product::create([
        'date'=>request()->get('date'),
        'category_id'=>request()->get('category_id'),
        'prod'=>request()->get('prod'),
        'p_img'=>$filename,
        'prod_price'=>request()->get('prod_price'),
        'selling_price'=>$rate,
        'discount_persent'=>-$selling_price,
        'stock'=>request()->get('stock'),
        'model'=>request()->get('model'),
        'delivery'=>request()->get('delivery'),
        'size'=>request()->get('size'),
        'slug'=>request()->get('slug'),
        'descp'=>request()->get('descp'),
 ]);

 if($request->colors){
foreach($request->colors as $key=> $color){
 $product->productColors()->create([

 ]);
}
 }
 
 return redirect()->to(route('products.index'))->with('success', 'Product Added successfully.');

   }

   

   public function show(string $id)
    {
        $product = Product::findOrFail($id); // Fetch the product by ID
    return view('admin.product_details', compact('product')); // Pass the product to the view
    }

    public function edit (string $id){
        return view('admin.products.edit');
         
       }

       public function update (Request $request, string $id)
       {
        $this->validate($request, [
            'date' => 'required',
            'category_id' => 'required',
            'prod' => 'required',
            'prod_price' => 'required',
            'selling_price' => 'required',
            'discount_persent' => 'required',
            'stock' => 'required',
            'model' => 'required',
            'delivery' => 'required',
            'size' => 'required',
            'slug' => 'required',
        ]);
        $product=Product::find($id);

        Product::create([
            'date'=>request()->get('date'),
            'category_id'=>request()->get('category_id'),
            'prod'=>request()->get('prod'),
            'prod_price'=>request()->get('prod_price'),
            'selling_price'=>request()->get('selling_price'),
            'discount_persent'=>request()->get('discount_persent'),
            'stock'=>request()->get('stock'),
            'model'=>request()->get('model'),
            'delivery'=>request()->get('delivery'),
            'size'=>request()->get('size'),
            'slug'=>request()->get('slug'),
            'descp'=>request()->get('descp'),
     ]);
    
    // //  if($request->colors){
    // // foreach($request->colors as $key=> $color){
    // //  $product->productColors()->create([
    
    // //  ]);
    // // }
    //  }
     return redirect()->to(route('products.index'))->with('success', 'Product Added successfully.');
    
       }

       public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->to(route('products.index'));
    }

   
}
