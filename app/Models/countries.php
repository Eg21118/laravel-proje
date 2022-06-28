<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    protected $guarded = [];

    static function getCountry($city) {
        $a = countries::where("id",$city)->first();
        if (!$a) {
            return "Deleted";
        }else {
            return $a->country_name;
        }
    }

}
