<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Bestsale;
use Illuminate\Http\Request;

class bestsaleController extends Controller
{
    public function index()
    {
        $bestsales = Bestsale::orderBy('id','DESC')->paginate(4);

        return view('frontend.bestsale.index')->with(compact('bestsales'));
    }
}
