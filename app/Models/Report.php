<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {

    public $primaryKey = "report_id";

    public function subCategory() {
        return $this->belongsTo('App\Models\SubCategory', 'sub_category_id', 'sub_category_id');
    }

    public function publisher() {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id', 'publisher_id');
    }

    public function region() {
        return $this->belongsTo('App\Models\Region', 'region_id', 'region_id');
    }

    public static $reportRule = [
        'report_title' => 'required|unique:reports,report_title',
        'sub_category_id' => 'required',
        'publisher_id' => 'required',
        'region_id' => 'required',
        'report_date' => 'required',
        // 'report_pages'=>'required',
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
    ];
    public static $editRule = [
        'report_title' => 'required',
        'sub_category_id' => 'required',
        'publisher_id' => 'required',
        'region_id' => 'required',
        'report_date' => 'required',
        // 'report_pages'=>'required',
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
    ];

}
