<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\continents;
use App\Models\countries;
use App\Models\information;
use App\Models\photos;
use Illuminate\Http\Request;

class ContinentsController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $data = \App\Models\continents::where("continent_name","like",'%' . $request->search . '%')->get();
        }else {
            $data = \App\Models\continents::all();
        }
        return view("front.continent.index",["data"=>$data]);
    }

    public function detail($id)
    {

        $data = continents::where("id",$id)->first();
        if (!$data) {
            die("error");
        }else {
            $data = continents::where("id", $id)->first();
            $information = information::where("information_parent", $data->id)->where("information_type", "continent")->first();
            $images = photos::where("photo_parent", $data->id)->where("photo_type", "continent")->get();
            return view("front.continent.detail",["data"=>$data,"information"=>$information,"images"=>$images]);
        }
    }
}
