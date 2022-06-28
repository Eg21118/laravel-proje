<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;

    protected $guarded = [];

    static function getİnformation($parent, $type)
    {
        $data = information::where("information_parent", $parent)->where("information_type", $type)->first();
        if ($data) {
            return $data->information_detail;
        } else {
            return null;
        }
    }

}
