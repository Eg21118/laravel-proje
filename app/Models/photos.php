<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photos extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getSinglePhoto($parent,$type) {
        $data = photos::where("photo_parent",$parent)->where("photo_type",$type)->first();
        if ($data) {
            return $data->photo_path;
        } else {
            return null;
        }
    }

}
