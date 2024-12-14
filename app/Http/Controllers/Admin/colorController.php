<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class colorController extends Controller
{
    public function index(){
        $colors=Color::orderby('id', 'desc')->paginate(10);
        return view('admin.color.index')->with(compact('colors'));
        

    }

    public function create (){

        return view('admin.color.add');

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string', // Ensure color is required and should be a string
            'code' => 'required|string|max:255',
            

        ]);
       

   

        Color::create([
            'name' => request()->get('name'),
             'code'=>request()->get('code'),
             
            
        ]);
        return redirect()->to(route('color.index'))->with('success', 'Brand Added successfully.');
    }


    public function show (){

    }

    public function edit(string $id){

        $color=Color::find($id);

        return view('admin.color.edit')->with(compact('color'));

    }

    public function update (Request $request, string $id){
      
        $this->validate($request,[
            'name' => 'required|string', // Ensure color is required and should be a string
            'code' => 'required|string|max:255',

        ]);
        $color=Color::find($id);
        
        Color::create([
            'name' => request()->get('name'),
             'code'=>request()->get('code'),
            
        ]);
        return redirect()->to(route('color.index'))->with('success', 'Color Updated successfully.');
    }

    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->to(route('color.index'))->with('success', 'Color Deleted successfully.');
    }
}
