<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index()
    {
        return view("back.register");
    }

    public function register_post(Request $request)
    {
        $request->validate([
            "email" => "required|unique:users",
            "password" => "required"
        ]);
        $data = [
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "user_role"=>"user"
        ];
        $create = User::create($data);
        if ($create) {
            return redirect()->back()->with("status", ["type" => "success", "text" => "Registration successful !"]);
        }else {
            return redirect()->back()->with("status", ["type" => "danger", "text" => "Incorrect Login Information !"]);
        }
    }
}
