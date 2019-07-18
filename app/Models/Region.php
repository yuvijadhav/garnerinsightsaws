<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {

    public $primaryKey = "region_id";
    public static $regionRule = [
        'name' => 'required',
    ];

}
