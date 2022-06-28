<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return view("back.index");
    }

    public function profile()
    {

    }

    public function profile_post(Request $request)
    {

    }
}
