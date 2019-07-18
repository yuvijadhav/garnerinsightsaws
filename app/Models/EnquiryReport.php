<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryReport extends Model {

    public $primaryKey = "enquiry_report_id";
    public static $rules = [
        'enquiry_name' => 'required',
        'enquiry_email' => 'required',
        'enquiry_phone' => 'required',
        'enquiry_company' => 'required',
        'enquiry_title' => 'required',
        'enquiry_country' => 'required'
    ];
    public static $rules1 = [
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required'
    ];

}
