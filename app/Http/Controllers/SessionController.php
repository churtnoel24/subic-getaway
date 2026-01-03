<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store()
    {
        $data = request()->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (! Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        };

        request()->session()->regenerate();

        if (request()->filled('remember_email')) {
            Cookie::queue(
                'remember_email',
                request()->email,
                60 * 24 * 30 // 30 days
            );
        } else {
            Cookie::queue(Cookie::forget('remember_email'));
        }

        return redirect('/dashboard')->with('success', 'Logged in successfully');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logged out.');
    }
}
