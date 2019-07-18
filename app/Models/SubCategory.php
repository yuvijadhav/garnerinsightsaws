<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model {

    public $primaryKey = "sub_category_id";
    public static $rules = [
        'sub_category_icon' => 'required',
        'sub_category_name' => 'required',
        'sub_category_image' => 'required'
    ];
    public static $rules1 = [
        'sub_category_name' => 'required',
    ];

}
