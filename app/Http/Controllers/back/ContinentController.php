<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\continents;
use App\Models\countries;
use App\Models\information;
use App\Models\photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContinentController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role=="admin") {
            $data = continents::all();
        }else {
            $data = continents::where("continent_createduser",auth()->user()->id)->get();
        }
        return view("back.continent.index",["data"=>$data]);
    }

    public function delete($id)
    {
        if (continents::where("id", $id)->where("continent_createduser",auth()->user()->id)->delete()) {
            information::where("information_parent", $id)->where("information_type", "continent")->delete();
            $images = photos::where("photo_parent", $id)->where("photo_type", "continent")->get();
            foreach ($images as $row) {
                File::delete(public_path("continent/" . $row->photo_path));
            }
            photos::where("photo_parent", $id)->where("photo_type", "continent")->delete();
            return redirect()->back()->with("status", ["type" => "success", "text" => "Continent successfully deleted."]);
        } else {
            return redirect()->back()->with("status", ["type" => "success", "text" => "System error occurred."]);
        }
    }

    public function add()
    {
        return view("back.continent.add");
    }

    public function addContinent(Request $request)
    {
        $request->flush();
        $request->validate([
            "continentname" => "required",
            "information" => "required"
        ]);
        $insert = continents::create([
            "continent_name" => $request->input("continentname"),
            "continent_createduser" => auth()->user()->id
        ]);
        if ($insert) {
            information::create([
                "information_detail" => $request->input("information"),
                "information_parent" => $insert->id,
                "information_type" => "continent",
                "information_createduser" => auth()->user()->id
            ]);

            $files = $request->file('images');
            foreach ($files as $file) {
                $name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                $file->move('continent', $name);
                photos::create([
                    "photo_path" => $name,
                    "photo_parent" => $insert->id,
                    "photo_type" => "continent",
                    "photo_createduser" => auth()->user()->id
                ]);
            }

            return redirect()->back()->with("status", ["type" => "success", "text" => "Continent created successful."]);
        } else {
            return redirect()->back()->with("status", ["type" => "danger", "text" => "System error occurred."]);
        }
    }

    public function edit($id, Request $request)
    {
        $data = continents::where("id", $id)->where("continent_createduser",auth()->user()->id)->first();
        $information = information::where("information_parent", $data->id)->where("information_type", "continent")->first();
        $images = photos::where("photo_parent", $data->id)->where("photo_type", "continent")->get();
        return view("back.continent.edit", ["data" => $data, "information" => $information, "images" => $images]);
    }

    public function editContinent($id, Request $request)
    {
        $request->validate([
            "continentname" => "required",
            "information" => "required"
        ]);
        $update = continents::where("id", $id)->where("continent_createduser",auth()->user()->id)->update([
            "continent_name" => $request->input("continentname")
        ]);
        if ($update) {
            information::where("information_parent", $id)->where("information_type", "continent")->update([
                "information_detail" => $request->input("information")
            ]);
            $files = $request->file('images');
            if ($files) {
                foreach ($files as $file) {
                    $name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                    $file->move('continent', $name);
                    photos::create([
                        "photo_path" => $name,
                        "photo_parent" => $id,
                        "photo_type" => "continent",
                        "photo_createduser" => auth()->user()->id
                    ]);
                }
            }
            return redirect()->back()->with("status", ["type" => "success", "text" => "Update process successful."]);
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
                File::delete(public_path("continent/".$photo_path));
                echo "ok";
            } else {
                echo "no";
            }
        }
    }

}
