<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrontReport extends Model {

    //
    protected $table = 'report';
    public $primaryKey = "report_id";

    public function subCategory() {
        return $this->belongsTo('App\SubCategory', 'sub_category_id', 'sub_category_id');
    }

    public function publisher() {
        return $this->belongsTo('App\Publisher', 'publisher_id', 'publisher_id');
    }

    public function region() {
        return $this->belongsTo('App\Region', 'region_id', 'region_id');
    }

    public function reportdetails() {
        return $this->hasOne('App\FrontReportdetail', 'report_id', 'report_id');
    }

    public static $reportRule = [
        'report_title' => 'required|unique:reports,report_title',
        'sub_category_id' => 'required',
        'publisher_id' => 'required',
        'region_id' => 'required',
        'report_date' => 'required',
    ];
    public static $editRule = [
        'report_title' => 'required',
        'sub_category_id' => 'required',
        'publisher_id' => 'required',
        'region_id' => 'required',
        'report_date' => 'required',
    ];

}
