<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\cities;
use App\Models\countries;
use App\Models\information;
use App\Models\photos;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $data = \App\Models\countries::where("country_name","like",'%' . $request->search . '%')->get();
        }else {
            $data = \App\Models\countries::all();
        }
        return view("front.countries.index",["data"=>$data]);
    }

    public function detail($id,$search=null)
    {
        if ($search==null) {
            $data = countries::where("id",$id)->first();
        }else {
            $data = countries::where("id", $id)->where("country_name","like",'%' . $search . '%')->first();
        }
        if (!$data) {
            die("error");
        }else {
            $data = countries::where("id", $id)->first();
            $information = information::where("information_parent", $data->id)->where("information_type", "country")->first();
            $images = photos::where("photo_parent", $data->id)->where("photo_type", "country")->get();
            return view("front.countries.detail",["data"=>$data,"information"=>$information,"images"=>$images]);
        }
    }
}
