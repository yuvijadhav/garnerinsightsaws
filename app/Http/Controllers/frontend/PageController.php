<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubCategory;
use App\Models\FrontReport;

class PageController extends Controller {
    /*
     * ================================ 
     * 
     */

    public function getHome() {
        $sub_categories = SubCategory::all();
        $report = FrontReport::where('status', '1')->with('subCategory')->orderBy('report_id', 'desc')->take(6)->get();
        return view("Frontend.index")->with('report', $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getabout() {
        $sub_categories = SubCategory::all();
        return view("Frontend.about-us")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getFaq() {
        $sub_categories = SubCategory::all();
        return view("Frontend.faq")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getTermsAndCondition() {
        $sub_categories = SubCategory::all();
        return view("Frontend.terms-and-condition")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getReturnPolicy() {
        $sub_categories = SubCategory::all();
        return view("Frontend.return-policy")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getPrivacyPolicy() {
        $sub_categories = SubCategory::all();
        return view("Frontend.privacy-policy")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getDisclaimer() {
        $sub_categories = SubCategory::all();
        return view("Frontend.disclaimer")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getHowtoOrder() {
        $sub_categories = SubCategory::all();
        return view("Frontend.how-to-order")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getDelivery() {
        $sub_categories = SubCategory::all();
        return view("Frontend.delivery")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getServices() {
        $sub_categories = SubCategory::all();
        $report = FrontReport::where('status', '1')->with('subCategory')->orderBy('report_id', 'desc')->take(5)->get();
        return view("Frontend.services")->with('report', $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getFormatnDelivery(Request $request) {
        $sub_categories = SubCategory::all();
        return view('Frontend.formatsndelivery')->with('sub_categories', $sub_categories);
    }

}
