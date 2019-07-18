<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrontReportdetail extends Model {

    //
    protected $table = 'report_details';
    public $primaryKey = "id";
//    public function report() {
//        return $this->belongsTo('App\FrontReport', 'report_id', 'report_id');
//    }

    public static $reportDetailRule = [
        'report_id' => 'required',
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
    ];
    public static $editRule = [
        'report_id' => 'required',
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
    ];

}
