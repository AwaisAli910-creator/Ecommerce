<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use Illuminate\Http\Request;

class contactusController extends Controller
{
    public function index()
    {
    return view('frontend.contactus');
    }

    public function sendEmail(Request $request)
    {
        // Input ko validate karna
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        // Email data tayyar karna
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
    
        // Email bhejna
        \Mail::raw("From: {$data['name']} <{$data['email']}>\n\nMessage:\n{$data['message']}", function($message) use ($data) {
            $message->to('awaisal228@gmail.com') // Apna admin email daalein
                    ->subject($data['subject']);
        });
    
        return redirect('/contactus')->with('success', 'Aapka paighaam bhej diya gaya hai!');
    }
    
    }
