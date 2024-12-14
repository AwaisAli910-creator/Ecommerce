<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



class userController extends Controller
{
    public function UserDashboard()
    {
        return view('dashboard');

    }

    public function UserLogin()
    {
        return view ('auth.login');
    }

    public function UserLogout (Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
