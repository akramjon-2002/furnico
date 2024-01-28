<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('frontend.home');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'regex:/[0-9]/', 'min:8'],
        ]);

        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);


            $user->assignRole('user');

            Auth::login($user);
            return redirect()->route('frontend.home ');
        } catch (\Exception $e) {
            return redirect()->route('user.registration')->with('error', 'Foydalanuvchini saqlashda muammo yuz berdi:(');
        }
    }
}
