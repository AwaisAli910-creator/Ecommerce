<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        $categories=Category::orderby('id', 'desc')->paginate(10);
        return view('admin.category.index')->with(compact('categories'));
        

    }

    public function create (){

        return view('admin.category.add');

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            // 'title' => 'required',
            'date'=>'required',
            // 'b_img' => 'required|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
       

    // Handle the image upload
    if (request()->hasFile('b_img')) {
        $file = request()->file('b_img');
        $filename = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/category_img'), $filename);
    } else {
        $filename = 'Image will be here';
    }

        Category::create([
            'title' => request()->get('title'),
             'date'=>request()->get('date'),
             'b_img'=>$filename,
            'descp' =>request()->get('descp'),
        ]);
        return redirect()->to(route('category.index'))->with('success', 'Brand Added successfully.');
    }


    public function show (){

    }

    public function edit(string $id){

        $category=Category::find($id);

        return view('admin.category.edit')->with(compact('category'));

    }

    public function update (Request $request, string $id){
      
        $category=Category::find($id);
        
        
    /// Handle the image upload
    if (request()->hasFile('b_img')) {
        $file = request()->file('b_img');
        $filename = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/category_img'), $filename);
    } else {
        $filename = 'Image will be here';
    }
        
      $category->update([
            'title' => request()->get('title'),
             'date'=>request()->get('date'),
             'b_img'=>$filename,
             
            'descp' =>request()->get('descp'),
        ]);
        return redirect()->to(route('category.index'))->with('success', 'Brand Added successfully.');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->to(route('category.index'));
    }
}
