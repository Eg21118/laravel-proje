<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view("back.login");
    }

    public function login_post(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('panel.index');
        } else {
            return redirect()->back()->with("status", ["type" => "danger", "text" => "Incorrect Login Information !"]);
        }
    }

    public function logout(Request $request)
    {
        \auth()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route("panel.login");
    }

}
