<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
// Use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\News;
use App\Models\Report;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Publisher;
use App\Models\Newsletter;
use App\Models\Region;
use App\Models\EnquiryReport;
use Weboap\Visitor\Visitor;
use App\Models\ReportUrl;
use App\Models\FrontReport;
use App\Models\FrontReportdetail;

class PublicController extends Controller {
    /*
     * ================================ 
     * 
     */

    public function getebs() {
        $sub_categories = SubCategory::all();
        return view('public.ebs1')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function postebs() {
        $sub_categories = SubCategory::all();
        return view('public.ebs2')->with('$sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function checkout() {
        $sub_categories = SubCategory::all();
        return view('public.checkout')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function checkoutEBS() {
        $sub_categories = SubCategory::all();
        return view('public.checkoutEBS')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getHome() {
        /* $sub_categories=SubCategory::all();
          return view("public.index")->with('sub_categories',$sub_categories); */
        $sub_categories = SubCategory::all();
        $report = FrontReport::where('status', '1')->with('subCategory')->orderBy('report_id', 'desc')->take(6)->get();
//        dd($report);
        return view("public.index")->with('report', $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getAboutus() {
        $sub_categories = SubCategory::all();
        return view("public.index")->with('sub_categories', $sub_categories);
    }

    public function getFaq() {
        $sub_categories = SubCategory::all();
        return view("faq")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getContact() {
        $sub_categories = SubCategory::all();
        return view("contact")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function postContact(Request $request) {
        // $ip= $request->getClientIp();
        $ip = \Request::getClientIp(true);
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $city = $request->city;
        $subject = $request->subject;
        $message = $request->message;
        $object = array('name' => $name, 'email' => $email, 'mobile' => $mobile, 'city' => $city, 'subject' => $subject, 'text' => $message, 'filename' => 'contact', 'ip' => $ip);
        //$this->sendHtmlMail2($object);
        return redirect('thank-you');
    }

    /*
     * ================================ 
     * 
     */

    public function postQuote(Request $request) {
        // $ip= $request->getClientIp();
        $ip = \Request::getClientIp(true);
        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $message = $request->message;
        $object = array('name' => $name, 'email' => $email, 'mobile' => $mobile, 'text' => $message, 'filename' => 'quote', 'ip' => $ip);
        //$this->sendHtmlMail3($object);
        return redirect('thank-you');
    }

    /*
     * ================================ 
     * 
     */

    public function getabout() {
        $sub_categories = SubCategory::all();
        return view("about-us")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getTermsAndCondition() {
        $sub_categories = SubCategory::all();
        return view("terms-and-condition")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getReturnPolicy() {
        $sub_categories = SubCategory::all();
        return view("return-policy")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getPrivacyPolicy() {
        $sub_categories = SubCategory::all();
        return view("privacy-policy")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getDisclaimer() {
        $sub_categories = SubCategory::all();
        return view("disclaimer")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getHowtoOrder() {
        $sub_categories = SubCategory::all();
        return view("how-to-order")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getDelivery() {
        $sub_categories = SubCategory::all();
        return view("delivery")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getSitemap() {
        $sub_categories = SubCategory::all();
        return view("sitemap")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getcheckout() {
        $sub_categories = SubCategory::all();
        return view('public.checkout')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getPaymentMethods(Request $request) {
        $sub_categories = SubCategory::all();
        return view('public.payment-methods')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getServices() {
        $sub_categories = SubCategory::all();
        $report = FrontReport::where('status', '1')->with('subCategory')->orderBy('report_id', 'desc')->take(5)->get();
        return view("public.services")->with('report', $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function postNewsletter(Request $request) {
        $sub_categories = SubCategory::all();
        $post = $request->all();
        $this->validate($request, ['email' => 'required']);
        $newsletter = new Newsletter();
        $newsletter->email = $post['email'];
        $newsletter->save();
        flash('subscribed successfully', 'success')->important();
        return view('public.index')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getArticles(Request $request) {
        $sub_categories = SubCategory::all();
        $data = Article::take(10)->orderBy('created_at', 'desc')->get();
        $total_count = Article::count();
        $tbl = $this->getCurrentTable();
        $report = DB::table($tbl)
                        ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                        ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
                        ->orderBy('report_id', 'desc')->take(10)->get();
        return view('public.pressRelease')->with('data', $data)->with('total_count', $total_count)->with("report", $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getArticlesData(Request $request) {
        $post = $request->all();
        $page = $post['active_page'];
        $limit = $post['limit'];
        $total_count = Article::count();
        $data = Article::skip(($page - 1) * $limit)->take($limit)->get();
        $data = array("total_count" => $total_count, "data" => $data);
        return $data;
    }

    /*
     * ================================ 
     * 
     */

    public function getNews(Request $request) {
        $sub_categories = SubCategory::all();
        $data = News::take(10)->get();
        $total_count = News::count();
        $report = FrontReport::where('status', 1)->with('subCategory')->orderBy('report_id', 'desc')->take(10)->get();
        return view('public.blogs')->with('data', $data)->with('total_count', $total_count)->with("report", $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    //ajax
    public function getNewsData(Request $request) {
        $post = $request->all();
        $page = $post['active_page'];
        $limit = $post['limit'];
        $total_count = News::count();
        $data = News::skip(($page - 1) * $limit)->take($limit)->get();
        $data = array("total_count" => $total_count, "data" => $data);
        return $data;
    }

    /*
     * ================================ 
     * 
     */

    public function getReports(Request $request) {
        $tbl = $this->getCurrentTable();
        $data = DB::table($tbl)
                ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                ->join('regions', 'regions.region_id', '=', $tbl . '.region_id')
                ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
                ->orderBy('report_id', 'desc');
        $total_count = $data->count();
        $data = $data->take(10)->get();
        $sub_categories = $categories = SubCategory::all();
        $regions = Region::all();


        return view('public.reports')->with('data', $data)->with("categories", $categories)->with("regions", $regions)->with('total_count', $total_count)->with("sub_category_id", "0")->with("search", "")->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getCategories(Request $request) {
//        $sub_categories = SubCategory::all();
        $data = $sub_categories = SubCategory::all();
        $total_count = SubCategory::count();
        $tbl = $this->getCurrentTable();
        $reports = DB::table($tbl)
                        ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                        ->join('regions', 'regions.region_id', '=', $tbl . '.region_id')
                        ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
                        ->orderBy('report_id', 'desc')->take(5)->get();
        return view('public.category')->with('data', $data)->with('total_count', $total_count)->with('report', $reports)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    //ajax
    public function getCategoryData(Request $request) {
        $post = $request->all();
        $page = $post['active_page'];
        $limit = $post['limit'];
        $total_count = SubCategory::count();
        $data = SubCategory::skip(($page - 1) * $limit)->take($limit)->get();
        $data = array("total_count" => $total_count, "data" => $data);
        return $data;
    }

    /*
     * ================================ 
     * 
     */

    public function postAddEnquiryReport(Request $request) {
        $this->validate($request, EnquiryReport::$rules);
        // $ip= $request->getClientIp();
        $ip = \Request::getClientIp(true);
        $post = $request->all();
        $report_id = $post['report_id'];
        $url = $post['url'];
        $enquiry_report = new EnquiryReport();
        $enquiry_report->enquiry_name = $post['enquiry_name'];
        $enquiry_report->enquiry_email = $post['enquiry_email'];
        $enquiry_report->enquiry_phone = $post['enquiry_phone'];
        $enquiry_report->enquiry_company = $post['enquiry_company'];
        $enquiry_report->enquiry_title = $post['enquiry_title'];
        $enquiry_report->enquiry_country = $post['enquiry_country'];
        $enquiry_report->save();
        $enquiry_source = $post['source'];
        $enquiry_title = $post['report_id'];
        $enquiry_description = $post['category_description'];

        $object = array('name' => $post['enquiry_name'], 'email' => $post['enquiry_email'], 'mobile' => $post['enquiry_phone'], 'designation' => $post['enquiry_title'], 'enquiry_company' => $post['enquiry_company'], 'country' => $post['enquiry_country'], 'description' => $enquiry_description, 'report_pages' => $post['report_pages'], 'report_title' => $post['report_id'], 'source' => $enquiry_source, 'ip' => $ip, 'url' => $url);
        $res = file_get_contents('https://www.iplocate.io/api/lookup/' . $object['ip']);
        $res = json_decode($res);
        $Array['name'] = $object['name'];
        $Array['mail'] = $object['email'];
        $Array['job_title'] = $object['designation'];
        $Array['company'] = $object['enquiry_company'];
        $Array['phone'] = $object['mobile'];
        $Array['country'] = $object['country'];
        $Array['message'] = $object['description'];
        $Array['report'] = $object['report_title'];
        $Array['region'] = $res->continent;
        // $Array['continent'] = $res['continent'];
        $Array['ip'] = $object['ip'];
        $Array['website'] = "garnerinsights.com";
        $Array['source'] = $object['source'];

        $url = "reportsmonitors.com/addLead";
        $postData = $Array;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);

        curl_close($ch);

//        $url = "http://159.89.149.111/addLead";
//        $postData = $Array;
////        dd($postData);
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, false);
//        curl_setopt($ch, CURLOPT_POST, count($postData));
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
//
//        $output = curl_exec($ch);
//        curl_close($ch);
        $this->sendHtmlMail($object);
        //flash('Enqury sent successfully','success')->important();
        return redirect('thank-you');
    }

    /*
     * ================================ 
     * 
     */

    public function postAddEnquiry(Request $request) {
        $this->validate($request, EnquiryReport::$rules1);
        $post = $request->all();
        $ip = \Request::getClientIp(true);
        $res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip);
        $res = json_decode($res);
        $country = $res->country;
        $report_id = $post['report_id'];
        $url = $post['url'];
        $enquiry_report = new EnquiryReport();
        $enquiry_report->enquiry_name = $post['name'];
        $enquiry_report->enquiry_email = $post['email'];
        $enquiry_report->enquiry_phone = $post['phone'];
        $enquiry_report->enquiry_company = "Enquiry";
        $enquiry_report->enquiry_title = "Enquiry";
        $enquiry_report->enquiry_country = $country;
        $enquiry_source = "Enquiry Before Buying";
        $enquiry_title = $post['report_id'];
        $enquiry_description = "";
        $object = array('name' => $post['name'], 'email' => $post['email'], 'mobile' => $post['phone'], 'designation' => '', 'enquiry_company' => '', 'country' => $country, 'description' => $enquiry_description, 'report_pages' => '', 'report' => $enquiry_title, 'source' => $enquiry_source, 'ip' => $ip, 'report_url' => $url);

        $Array['name'] = $object['name'];
        $Array['mail'] = $object['email'];
        $Array['job_title'] = $object['designation'];
        $Array['company'] = $object['enquiry_company'];
        $Array['phone'] = $object['mobile'];
        $Array['country'] = $res->country;
        $Array['message'] = $object['description'];
        $Array['report'] = $object['report'];
        $Array['region'] = $res->continent;
        $Array['ip'] = $ip;
        $Array['website'] = "garnerinsights.com";
        $Array['source'] = $object['source'];

        $postData = $Array;

        $url = "reportsmonitors.com/addLead";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $output = curl_exec($ch);
        curl_close($ch);


        $this->sendHtmlMail1($object);
        //flash('Enqury sent successfully','success')->important();
        return redirect('thank-you');
    }

    /*
     * ================================ 
     * 
     */

    public function getReportDetailsOLD($url) {
        $sub_categories = SubCategory::all();

        if ($url != "null") {
            try {
                DB::connection()->reconnect();
//                dd(__LINE__);
//                return true;
            } catch (Exception $ex) {
//                dd(__LINE__);
//                return false;
            }
            $reportURLdata = DB::table('reportsurl')->where('url', $url)->first();
            if (($reportURLdata) != NULL) {
                $report_id = $reportURLdata->report_id;
                $report = Report::where('status', 1)->where("report_id", $report_id)->with("publisher")->with("subCategory")->with("region")->first();
            } else {
                $report = Report::where('status', 1)->where("url", $url)->with("publisher")->with("subCategory")->with("region")->first();
            }

            $relatedReports = Report::where('status', 1)->where("sub_category_id", $report->sub_category_id)->where("report_id", "!=", $report->report_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();



            return view('report.reportDetails')->with('report', $report)->with('relatedReports', $relatedReports)->with('sub_categories', $sub_categories);
        } else {
            return redirect('reports');
        }
    }

    /*
     * ================================ 
     * 
     * OLd functionaliy 
     */

    public function getReportDetailsOld28062019($url) {
        $sub_categories = SubCategory::all();
        if ($url != "null") {
            try {
                DB::connection()->reconnect();
//                dd(__LINE__);
//                return true;
            } catch (Exception $ex) {
//                dd(__LINE__);
//                return false;
            }
            $reportURLdata = DB::table('reportsurl')->where('url', $url)->first();
            if (($reportURLdata) != NULL) {
                $report_id = $reportURLdata->report_id;
                $report = Report::where('status', 1)->where("report_id", $report_id)->with("publisher")->with("subCategory")->with("region")->first();
                $relatedReports = Report::where('status', 1)->where("sub_category_id", $report->sub_category_id)->where("report_id", "!=", $report->report_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
                return view('report.reportDetails')->with('report', $report)->with('relatedReports', $relatedReports)->with('sub_categories', $sub_categories);
            } else {
                $report = FrontReport::where('status', 1)->where("url", $url)->with("publisher")->with("subCategory")->with("region")->with("reportdetails")->first();
                if (($report) != NULL) {
                    $relatedReports = Report::where('status', 1)->where("sub_category_id", $report->sub_category_id)->where("report_id", "!=", $report->report_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
                    return view('report.reportDetailsData')->with('report', $report)->with('relatedReports', $relatedReports)->with('sub_categories', $sub_categories);
                } else {

                    $report = Report::where('status', 1)->where("url", $url)->with("publisher")->with("subCategory")->with("region")->first();
                    if (($report) != NULL) {
                        $relatedReports = Report::where('status', 1)->where("sub_category_id", $report->sub_category_id)->where("report_id", "!=", $report->report_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
                        return view('report.reportDetails')->with('report', $report)->with('relatedReports', $relatedReports)->with('sub_categories', $sub_categories);
                    } else {
                        return redirect('reports');
                    }
                }
//                $reportdetails = FrontReportdetail::where('status', 1)->where("url", $report->sub_category_id)->with("publisher")->with("subCategory")->with("region")->first();
            }
        } else {
            return redirect('reports');
        }
    }

    /*
     * ================================ 
     * 
     */

    public function getReportDetails($url) {
        $sub_categories = SubCategory::all();
        if ($url != "null") {

//            $reportURLdata = DB::table('reportsurl')->where('url', $url)->first();
//            if (($reportURLdata) != NULL) {
//                $report_id = $reportURLdata->report_id;
//                $report = Report::where('status', 1)->where("report_id", $report_id)->with("publisher")->with("subCategory")->with("region")->first();
//                $relatedReports = Report::where('status', 1)->where("sub_category_id", $report->sub_category_id)->where("report_id", "!=", $report->report_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
//                return view('report.reportDetails')->with('report', $report)->with('relatedReports', $relatedReports)->with('sub_categories', $sub_categories);
//            } else {
            $report = array();
//            $reportURLdata = DB::table('report')->where("url", trim($url))->first();
//            dd($reportURLdata);
            $tbl = $this->getCurrentTable();
            $tbl2 = "report_details" . str_replace("report", "", $tbl);
            $report = DB::table($tbl)
                            ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                            ->join('regions', 'regions.region_id', '=', $tbl . '.region_id')
                            ->join('publishers', 'publishers.publisher_id', '=', $tbl . '.publisher_id')
                            ->join($tbl2, $tbl2 . '.report_id', '=', $tbl . '.report_id')
                            ->select($tbl2 . '.*', $tbl . '.report_title', $tbl . '.report_date', $tbl . '.url', 'sub_categories.sub_category_name', 'sub_categories.sub_category_description', 'sub_categories.sub_category_id', 'sub_categories.sub_category_image', 'regions.name as regions_name', 'publishers.publisher_name')
                            ->where("url", $url)->orderBy('report_id', 'desc')->first();
//            dd($report);
//            $report = FrontReport::where('status', 1)->where("url", trim($url))->with("publisher")->with("subCategory")->with("region")->with("reportdetails")->first();
//            dd($report);
//            if (($report) != NULL) {
//            $relatedReports = Report::where('status', 1)->where("sub_category_id", $report->sub_category_id)->where("report_id", "!=", $report->report_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
//                $relatedReports = FrontReport::where('status', 1)->where("sub_category_id", $report->sub_category_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
//                return view('report.reportDetailsData')->with('report', $report)->with('relatedReports', $relatedReports)->with('sub_categories', $sub_categories);
//            } else {
//                $report = Report::where('status', 1)->where("url", $url)->with("publisher")->with("subCategory")->with("region")->first();
            if (($report) != NULL) {
//                dd($report->sub_category_id);
                $relatedReports = FrontReport::where('status', 1)->where("sub_category_id", $report->sub_category_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
//                    $relatedReports = Report::where('status', 1)->where("sub_category_id", $report->sub_category_id)->where("report_id", "!=", $report->report_id)->with("publisher")->with("subCategory")->orderBy('report_id', 'desc')->take(2)->get();
                return view('report.reportDetails')->with('report', $report)->with('relatedReports', $relatedReports)->with('sub_categories', $sub_categories);
            } else {
                return redirect('reports');
            }
        }
    }

    /*
     * ================================ 
     * 
     */

    public function getNewsDetails(Request $request) {
        $sub_categories = SubCategory::all();
        $news_id = $request->url;
        $news = News::where("news_url", $news_id)->first();
        $report = Report::where('status', 1)->orderBy('report_id', 'desc')->orderBy('report_id', 'desc')->take(10)->get();
        $relatedNews = News::where("news_id", "!=", $news->news_id)->take(5)->get();
        return view('news.blogDetails')->with('news', $news)->with('relatedNews', $relatedNews)->with('report', $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getArticleDetails(Request $request) {
        $sub_categories = SubCategory::all();

        $article_id = $request->url;
        $article = Article::where("article_url", $article_id)->first();
        $relatedArticle = Article::where("article_id", "!=", $article->article_id)->take(5)->get();
        $tbl = $this->getCurrentTable();
        $report = DB::table($tbl)
                        ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                        ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
//                ->take(6)
                        ->orderBy('report_id', 'desc')->take(10)->get();
        return view('article.pressReleaseDetails')->with('article', $article)->with('relatedArticle', $relatedArticle)->with('report', $report)->with('search', '')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getCategoryDetails(Request $request) {
        $sub_categories = SubCategory::all();
        $sub_category_id = $_GET['id'];
        $sub_category = SubCategory::where("sub_category_id", $sub_category_id)->first();
        $relatedCategory = SubCategory::where("sub_category_id", "!=", $sub_category->sub_category_id)->take(10)->get();
        $tbl = $this->getCurrentTable();
        $report = DB::table($tbl)
                        ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                        ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
                        ->orderBy('report_id', 'desc')->take(10)->get();
        return view('public.categoryDetails')->with('sub_category', $sub_category)->with('relatedCategory', $relatedCategory)->with('report', $report)->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getFormatnDelivery(Request $request) {
        $sub_categories = SubCategory::all();
        return view('formatsndelivery')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function postReports(Request $request) {
        $sub_categories = SubCategory::all();
        $sub_category_id = $request->id;
        $search = $request->search;
        $tbl = $this->getCurrentTable();
        $reports = DB::table($tbl)
                ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                ->join('regions', 'regions.region_id', '=', $tbl . '.region_id')
                ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
//                ->take(6)
                ->orderBy('report_id', 'desc');
//                ->get();
//        $reports = FrontReport::where('status', 1)->with('subCategory')->with('region')->orderBy('report_id', 'desc');
//        dd($reports);
        if (isset($search)) {
            $reports = $reports->where('report_title', 'like', "%" . $search . "%");
        }
        /*
         * ================================ 
         * 
         */
        if (isset($sub_category_id)) {
            $reports = $reports->where('sub_category_id', $sub_category_id);
        } else {
            $sub_category_id = 0;
        }
        $total_count = $reports->count();
        $reports = $reports->take(10)->get();
//        dd($reports);
        $regions = Region::all();


        return view('public.reports')->with('sub_category_id', $sub_category_id)->with('data', $reports)->with('categories', $sub_categories)->with('regions', $regions)->with('total_count', $total_count)->with('search', $search)->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    //Ajax
    public function getReportsData(Request $request) {
        $sub_categories = SubCategory::all();
        $post = $request->all();
        $page = $post['active_page'];
        $limit = $post['limit'];
        $categories = $request->categories;
        $regions = $request->regions;
        $search = $request->search;
        $table = DB::table('report_tables')->select('tablename', 'no_of_records')->where('status', 'inprogress')->first();
//        $reports = FrontReport::where('status', 1)->orderBy('report_id', 'desc');
        $tbl = $this->getCurrentTable();
        $reports = DB::table($tbl)
                ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
//                ->take(6)
                ->orderBy('report_id', 'desc');
        if ($categories != "") {
            $reports = $reports->whereIn($tbl . ".sub_category_id", $categories);
        }
        if ($regions != "") {
            $reports = $reports->whereIn($tbl . ".region_id", $regions);
        }
        if ($search != "") {
            $reports = $reports->where($tbl . '.report_title', 'like', "%" . $search . "%");
        }
        $total_count = $reports->count();
//        $reports = $reports->take(10)->get();
        $reports = $reports->skip(($page - 1) * $limit)->take($limit)->get();
//        return $reports;
//        $reports = $reports->with('subCategory')->with('region')->with("reportdetails")->skip(($page - 1) * $limit)->take($limit)->get();
        $data = array("total_count" => $total_count, "data" => $reports, "sub_categories" => $sub_categories);
        return $data;
    }

    /*
     * ================================ 
     * 
     */

    public function getCategory($url) {
        $category = SubCategory::where('sub_category_description', $url)->first();
        if ($category != "") {
//            $sub_categories = SubCategory::all();
            $sub_category_id = $category->sub_category_id;
            $search = "";
            $tbl = $this->getCurrentTable();
            $reports = DB::table($tbl)
                    ->join('sub_categories', 'sub_categories.sub_category_id', '=', $tbl . '.sub_category_id')
                    ->join('regions', 'regions.region_id', '=', $tbl . '.region_id')
                    ->select($tbl . '.*', 'sub_categories.sub_category_name', 'sub_categories.sub_category_image')
                    ->orderBy('report_id', 'desc');
//            $reports = FrontReport::where('status', 1)->with('subCategory')->with('region')->take(10)->orderBy('report_id', 'desc');
//            $reports = $reports->where('sub_category_id', $sub_category_id);
            $total_count = $reports->count();
            $reports = $reports->take(10)->get();
            $categories = SubCategory::all();
            $regions = Region::all();
            return view('public.reports')->with('sub_category_id', $sub_category_id)->with('data', $reports)->with('categories', $categories)->with('regions', $regions)->with('total_count', $total_count)->with('search', $search)->with('sub_categories', $categories);
        } else {
            return redirect('reports');
        }
    }

    /*
     * ================================ 
     * 
     */

    public function getHeader(Request $request) {
        return view('layouts.header');
    }

    /*
     * ================================ 
     * 
     */

    public function getCategorMenu(Request $request) {
        $sub_categories = SubCategory::all();
        return $sub_categories;
    }

    /*
     * ================================ 
     * 
     */

    public function getPaymentSuccess(Request $request) {
        $sub_categories = SubCategory::all();
        return view('mail.paymentSuccess')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function postPaymentSuccess(Request $request) {
        $sub_categories = SubCategory::all();
        return view('mail.paymentSuccess')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getCancelPayment(Request $request) {
        $sub_categories = SubCategory::all();
        return view('mail.paymentCancel')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function postCancelPayment(Request $request) {
        $sub_categories = SubCategory::all();
        return view('mail.paymentCancel')->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function siteMapReport(Request $request) {
        $sub_categories = SubCategory::all();
        $reports = FrontReport::where('status', 1)->with('subCategory')->take(1000)->orderBy('report_id', 'desc')->get();
        return view('report.siteMapReports')->with('reports', $reports)->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function siteMapPressRelease(Request $request) {
        $sub_categories = SubCategory::all();
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('public.siteMapPressRelease')->with('articles', $articles)->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function siteMapBlog() {
        $sub_categories = SubCategory::all();
        $news = News::orderBy('created_at', 'desc')->get();
        return view('public.siteMapBlog')->with('news', $news)->with('sub_categories', $sub_categories);
    }

    /*
     * ================================ 
     * 
     */

    public function getThankyou(Request $request) {
//        dd($request);
        $sub_categories = SubCategory::all();
//          dd($sub_categories);
//        $report = Report::with('subCategory')->orderBy('created_at', 'desc')->take(1)->get();
        $report = array();
        return view('public.thankYou')->with('report', $report);
    }

    /*
     * ================================ 
     * 
     */

    public function clearSession() {
//        $result = mysql_query("SHOW FULL PROCESSLIST");
        $results = DB::select("select * from information_schema.processlist where user='gimzfdgcdbyb' and DB='gimzfdgcdbyb';");
        if ($results) {
            foreach ($results as $row) {
                $process_id = $row->ID;
                if ($row->TIME > 10) {
                    $sql = "KILL $process_id";
                    DB::statement($sql);
//                    echo $sql;
                }
            }
        }
    }

    public function getCurrentTable() {
        $table = DB::table('report_tables')->select('tablename', 'no_of_records')->where('status', 'inprogress')->first();
        if ($table) {
            $tbl = $table->tablename;
        } else {
            $tbl = "report_titles";
        }
        return$tbl;
    }

}
