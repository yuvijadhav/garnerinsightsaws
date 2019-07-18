<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    public $primaryKey = "article_id";
    public static $articleRule = [
        'article_title' => 'required',
        // 'article_image'=>'required',
        'article_description' => 'required',
        'article_url' => 'required'
    ];
    public static $articleRule1 = [
        'article_title' => 'required',
        'article_description' => 'required',
        'article_url' => 'required'
    ];

}
