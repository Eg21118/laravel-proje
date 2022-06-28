<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class continents extends Model
{
    use HasFactory;
    protected $guarded = [];
    static function getContinents($country) {
        $a = continents::where("id",$country)->first();
        if (!$a) {
            return "Deleted";
        }else {
            return $a->continent_name;
        }
    }

}
