<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\cities;
use App\Models\continents;
use App\Models\information;
use App\Models\photos;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $data = \App\Models\cities::where("city_name","like",'%' . $request->search . '%')->get();
        }else {
            $data = \App\Models\cities::all();
        }
        return view("front.cities.index",["data"=>$data]);
    }

    public function detail($id)
    {
        $data = cities::where("id",$id)->first();
        if (!$data) {
            die("error");
        }else {
            $data = cities::where("id", $id)->first();
            $information = information::where("information_parent", $data->id)->where("information_type", "city")->first();
            $images = photos::where("photo_parent", $data->id)->where("photo_type", "city")->get();
            return view("front.cities.detail",["data"=>$data,"information"=>$information,"images"=>$images]);
        }
    }

}
