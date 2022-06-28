<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\countries;
use App\Models\information;
use App\Models\photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role=="admin") {
            $data = countries::all();
        }else {
            $data = countries::where("country_createduser",auth()->user()->id)->get();
        }
        return view("back.country.index",["data"=>$data]);
    }

    public function edit($id)
    {
        if (auth()->user()->user_role=="admin") {
            $data = countries::where("id", $id)->first();
        }else {
            $data = countries::where("id", $id)->first();
        }
        $information = information::where("information_parent", $data->id)->where("information_type", "country")->first();
        $images = photos::where("photo_parent", $data->id)->where("photo_type", "country")->get();
        return view("back.country.edit", ["data" => $data, "information" => $information, "images" => $images]);
    }

    public function delete($id)
    {
        if (countries::where("id", $id)->delete()) {
            information::where("information_parent",$id)->where("information_type","country")->delete();
            $images = photos::where("photo_parent", $id)->where("photo_type", "country")->get();
            foreach ($images as $row) {
                File::delete(public_path("country/".$row->photo_path));
            }
            photos::where("photo_parent", $id)->where("photo_type", "country")->delete();
            return redirect()->back()->with("status", ["type" => "success", "text" => "Country successfully deleted."]);
        } else {
            return redirect()->back()->with("status", ["type" => "success", "text" => "System error occurred."]);
        }
    }

    public function editCountry($id, Request $request)
    {
        $request->validate([
            "countryname" => "required",
            "continent" => "required|not_in:0",
            "information" => "required"
        ]);
        $update = countries::where("id", $id)->update([
            "country_name" => $request->input("countryname"),
            "country_continent" => $request->input("continent")
        ]);
        if ($update) {
            information::where("information_parent", $id)->where("information_type", "country")->update([
                "information_detail" => $request->input("information")
            ]);
            $files = $request->file('images');
            if ($files) {
                foreach ($files as $file) {
                    $name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                    $file->move('country', $name);
                    photos::create([
                        "photo_path" => $name,
                        "photo_parent" => $id,
                        "photo_type" => "country",
                        "photo_createduser" => auth()->user()->id
                    ]);
                }
            }
            return redirect()->back()->with("status", ["type" => "success", "text" => "Update process successful."]);
        } else {
            return redirect()->back()->with("status", ["type" => "danger", "text" => "System error occurred."]);
        }

    }

    public function add()
    {
        return view("back.country.add");
    }

    public function addCountry(Request $request)
    {
        $request->flush();
        $request->validate([
            "countryname" => "required",
            "continent" => "required|not_in:0",
            "information" => "required",
            "images" => "required"
        ]);
        $insert = countries::create([
            "country_name" => $request->input("countryname"),
            "country_continent" => $request->input("continent"),
            "country_createduser" => auth()->user()->id
        ]);
        if ($insert) {
            information::create([
                "information_detail" => $request->input("information"),
                "information_parent" => $insert->id,
                "information_type" => "country",
                "information_createduser" => auth()->user()->id
            ]);

            $files = $request->file('images');
            foreach ($files as $file) {
                $name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                $file->move('country', $name);
                photos::create([
                    "photo_path" => $name,
                    "photo_parent" => $insert->id,
                    "photo_type" => "country",
                    "photo_createduser" => auth()->user()->id
                ]);
            }

            return redirect()->back()->with("status", ["type" => "success", "text" => "Adding country successful."]);
        } else {
            return redirect()->back()->with("status", ["type" => "danger", "text" => "System error occurred."]);
        }
    }

    public function deleteimage(Request $request)
    {
        $photo = photos::where("id", $request->image)->first();
        if (!$photo) {
            echo "nodata";
        } else {
            $photo_path = $photo->photo_path;
            $delete = photos::where("id", $request->image)->delete();
            if ($delete) {
                File::delete(public_path("country/".$photo_path));
                echo "ok";
            } else {
                echo "no";
            }
        }
    }

}
