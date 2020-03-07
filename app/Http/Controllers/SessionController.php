<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($request->only(["email", "password"]))) {
            return redirect()->route('home');
        }

        redirect()->back();
    }
}
