<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    public $primaryKey = "news_id";
    public static $rules = [
        'news_title' => 'required',
        'news_info' => 'required',
        'news_url' => 'required',
        'news_image' => 'required'
    ];
    public static $rules1 = [
        'news_title' => 'required',
        'news_info' => 'required',
        'news_url' => 'required',
    ];

}
