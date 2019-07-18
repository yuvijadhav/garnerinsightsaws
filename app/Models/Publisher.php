<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model {

    public $primaryKey = 'publisher_id';
    public static $rules = [
        'publisher_name' => 'required',
        'publisher_image' => 'required'
    ];
    public static $rules1 = [
        'publisher_name' => 'required',
    ];

}
