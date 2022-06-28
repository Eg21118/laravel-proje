<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\cities;
use App\Models\countries;
use App\Models\information;
use App\Models\photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{
    public function index()
    {
        if (auth()->user()->user_role=="admin") {
            $data = cities::all();
        }else {
            $data = cities::where("city_createduser",auth()->user()->id)->get();
        }
        return view("back.city.index",["data"=>$data]);
    }

    public function add()
    {
        return view("back.city.add");
    }

    public function delete($id)
    {
        if (cities::where("id", $id)->delete()) {
            information::where("information_parent", $id)->where("information_type", "city")->delete();
            $images = photos::where("photo_parent", $id)->where("photo_type", "city")->get();
            foreach ($images as $row) {
                File::delete(public_path("city/" . $row->photo_path));
            }
            photos::where("photo_parent", $id)->where("photo_type", "city")->delete();
            return redirect()->back()->with("status", ["type" => "success", "text" => "City successfully deleted."]);
        } else {
            return redirect()->back()->with("status", ["type" => "success", "text" => "System error occurred."]);
        }
    }

    public function ajax(Request $request)
    {
        if (isset($request->getcountry)) {
            $country = countries::where("country_continent",$request->continent)->get();
            foreach ($country as $row) { ?>
                <option value="<?php echo $row->id ?>">
                    <?php echo $row->country_name ?>
                </option>
            <?php }
        }
    }

    public function addCity(Request $request)
    {
        $request->validate([
            "cityname" => "required",
            "continent" => "required|not_in:0",
            "country" => "required|not_in:0",
            "information" => "required"
        ]);

        $create = cities::create([
            "city_name"=>$request->input("cityname"),
            "city_country"=>$request->input("country"),
            "city_continets"=>$request->input("continent"),
            "city_createduser"=>auth()->user()->id
        ]);

        if ($create) {
            information::create([
                "information_detail" => $request->input("information"),
                "information_parent" => $create->id,
                "information_type" => "city",
                "information_createduser" => auth()->user()->id
            ]);

            $files = $request->file('images');
            foreach ($files as $file) {
                $name = time() . uniqid() . "." . $file->getClientOriginalExtension();
                $file->move('city', $name);
                photos::create([
                    "photo_path" => $name,
                    "photo_parent" => $create->id,
                    "photo_type" => "city",
                    "photo_createduser" => auth()->user()->id
                ]);
            }
            return redirect()->back()->with("status", ["type" => "success", "text" => "Adding city successful."]);
        }else {
            return redirect()->back()->with("status", ["type" => "danger", "text" => "System error occurred."]);
        }

    }

    public function edit($id)
    {
        $data = cities::where("id", $id)->first();
        $information = information::where("information_parent", $data->id)->where("information_type", "city")->first();
        $images = photos::where("photo_parent", $data->id)->where("photo_type", "city")->get();
        return view("back.city.edit", ["data" => $data, "information" => $information, "images" => $images]);
    }

    public function editCity($id, Request $request)
    {
        $request->validate([
            "cityname" => "required",
            "continent" => "required|not_in:0",
            "country" => "required|not_in:0",
            "information" => "required"
        ]);

        $update = cities::where("id", $id)->update([
            "city_name"=>$request->input("cityname"),
            "city_country"=>$request->input("country"),
            "city_continets"=>$request->input("continent"),
        ]);
        if ($update) {
            information::where("information_parent", $id)->where("information_type", "city")->update([
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
                        "photo_type" => "city",
                        "photo_createduser" => auth()->user()->id
                    ]);
                }
            }
            return redirect()->back()->with("status", ["type" => "success", "text" => "Update process successful."]);
        } else {
            return redirect()->back()->with("status", ["type" => "danger", "text" => "System error occurred."]);
        }
    }

    public function deleteimage(Request $request) {
        $photo = photos::where("id", $request->image)->first();
        if (!$photo) {
            echo "nodata";
        } else {
            $photo_path = $photo->photo_path;
            $delete = photos::where("id", $request->image)->delete();
            if ($delete) {
                File::delete(public_path("city/".$photo_path));
                echo "ok";
            } else {
                echo "no";
            }
        }
    }

}
