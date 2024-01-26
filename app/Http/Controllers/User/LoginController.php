<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()){
            return redirect()->intended();
        }
        $formData = $request->only('email', 'password');
        if (Auth::attempt($formData)) {
            return redirect()->intended('frontend.home');
        }
        return redirect()->route('user.login')
            ->with('error', 'Shaxsiy profilga kirishda muammo yuz berdi:(');
    }
}
