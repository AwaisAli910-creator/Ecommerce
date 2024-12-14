<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class sizeController extends Controller
{
    public function index ()
    {   
        $sizes=Size::orderby('id', 'desc')->paginate(10);
        
        return view('admin.size.index')->with(compact('sizes'));
    }

    public function create ()
    {
        return view('admin.size.add');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'size' => 'required|string', 
        ]);
       

   

        Size::create([
            'size' => request()->get('size'),
        ]);
        return redirect()->to(route('size.index'))->with('success', 'Size Added successfully.');
    }

    
    

    public function show()
    {
        
    }

    public function edit(string $id)
    {
        $size=Size::findOrFail($id);

        return view('admin.size.edit')->with(compact('size'));

    }
    public function update(Request $request, string $id)
    {
        
        $this->validate($request,[
            'size' => 'required|string', 
            

        ]);
        $size=Size::find($id);
        
       $size->update([
            'size' => request()->get('size'),
             
            
        ]);
        return redirect()->to(route('size.index'))->with('success', 'Size Updated successfully.');
    }

    public function destroy(string $id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->to(route('size.index'))->with('success', 'Szie Deleted successfully.');
    }

}