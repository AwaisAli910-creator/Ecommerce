<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    public function index()
    {
        $sliders = slider::orderBy('id','DESC')->paginate(3);
          return view('admin.slider.index',compact('sliders'));
    }

    public function create ()
    {
        return view('admin.slider.add');
       
    }

    public function store (Request $request)
    {
        $this->validate($request,[
           'img'=>'required',
        ]);
        
        // Handle the image upload
    if (request()->hasFile('img')) {
        $file = request()->file('img');
        $filename = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/slider_img'), $filename);
    } else {
        $filename = 'Image will be here';
    }

        slider::create([
            'heading' => request()->get('heading'),
             'discount'=>request()->get('discount'),
             'img'=>$filename,
             'status' => $request->input('status', 'active'), // Default to 'active'
        ]);
        return redirect()->to(route('slider.index'))->with('success', 'Slider Added successfully.');
    }

    public function show ()
    {
        
    }

    public function edit (string $id)
    {
        $slider=slider::find($id);

        return view('admin.slider.edit')->with(compact('slider'));
    }

    public function update (Request $request, string $id)
    {
        $slider=slider::find($id);
        
        
        // Handle the image upload
    if (request()->hasFile('img')) {
        $file = request()->file('img');
        $filename = md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/slider_img'), $filename);
    } else {
        $filename = 'Image will be here';
    }

        slider::create([
            'heading' => request()->get('heading'),
             'discount'=>request()->get('discount'),
             'img'=>$filename,
             'status' => $request->input('status', 'active'), // Default to 'active'
        ]);
        return redirect()->to(route('slider.index'))->with('success', 'Slider Added successfully.');
    }


    public function updateStatus(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'status' => 'required|in:active,inactive', // Ensure status is valid
    ]);

    // Find the slider by ID
    $slider = slider::findOrFail($id);

    // Update the status
    $slider->update([
        'status' => $request->input('status'),
    ]);

    // Redirect back with success message
    return redirect()->route('slider.index')->with('success', 'Slider status updated successfully!');
}

public function destroy(string $id)
    {
        $slider = slider::find($id);
        $slider->delete();
        return redirect()->to(route('slider.index'))->with('success', 'Slider Deleted successfully.');
    }

}
