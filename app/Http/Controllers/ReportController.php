<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\SubCategory;
use App\Models\Publisher;
use Illuminate\Support\Facades\Input;
use Excel;
use App\Models\Region;
use Softon\Indipay\Facades\Indipay;
use App\Models\FrontReport;
use App\Models\FrontReportdetail;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller {
    /*
     * ================================ 
     * 
     */

    public function getAxisPayReturn(Request $request) {
        $post = $request->all();
        print_r($post);
        return view('payment.pay-return');
    }

    /*
     * ================================ 
     * 
     */

    public function getAddReport(Request $request) {
//        $report = Report::all();
//        dd($report);
        $report = array();
        $sub_category = SubCategory::all();
        $publisher = Publisher::all();
        $region = Region::all();
        return view('report.addReport')->with('report', $report)->with('sub_category', $sub_category)->with('publisher', $publisher)->with('region', $region);
    }

    /*
     * ================================ 
     * 
     */

    public function getAllReports(Request $request) {
        $data = FrontReport::with('subCategory')->orderBy('report_id', 'desc');
        $search = "";
        if (isset($request->search)) {
            $search = $request->search;
            $data = $data->where('report_title', 'like', "%" . $search . "%");
        }
        $total_count = FrontReport::where('status', '1')->count();
        $data = $data->take(10)->orderBy('report_id', 'desc')->get();
        return view('report.allReports')->with('data', $data)->with('total_count', $total_count)->with('search', $search);
    }

//Ajax
    /*
     * ================================ 
     * 
     */

    public function getAllReportData(Request $request) {
        $post = $request->all();
        $search = $request->search;
        $page = $post['active_page'];
        $limit = $post['limit'];

        $data = FrontReport::where('status', '1')->orderBy('report_id', 'desc');
        if ($search != "") {
            $data = $data->where('report_title', 'like', "%" . $search . "%");
        }
        $total_count = $data->count();
        $data = $data->skip(($page - 1) * $limit)->take($limit)->orderBy('report_id', 'desc')->get();
        $data = array("total_count" => $total_count, "data" => $data);
        return $data;
    }

    /*
     * ================================ 
     * 
     */

    public function getEditReport(Request $request) {
        if (isset($_GET['id'])) {
            $report_id = $_GET['id'];
//            $report = Report::find($report_id);
//            $reportDetails = reportsDetails::where('report_id', $report_id);
////            dd($reportDetails);
            $sub_category = SubCategory::all();
            $publisher = Publisher::all();
            $region = Region::all();

            $report = FrontReport::where("report_id", $report_id)->with("reportDetails")->first();
            return view('report.editReport')->with('report', $report)->with('sub_category', $sub_category)->with('publisher', $publisher)->with('region', $region);
        }
        return redirect('allReports');
    }

    /*
     * @function:postEditReport
     * @param:Request $request
     * @used to edit data of reports in database Report table 
     */

    public function postEditReport(Request $request) {
        $post = $request->all();
        $report_id = $post['report_id'];
        if ($report_id) {
            $report = FrontReport::find($report_id);
            $this->validate($request, FrontReport::$editRule);
            $this->validate($request, ['report_title' => 'unique:reports,report_title,' . $report_id . ',report_id']);
            $report->report_title = $post['report_title'];
            $report->sub_category_id = $post['sub_category_id'];
            $report->publisher_id = $post['publisher_id'];
            $report->region_id = $post['region_id'];
            $report->report_date = $post['report_date'];
            if (isset($post['status'])) {
                $report->status = 1;
            } else {
                $report->status = 0;
            }
            $report->url = $post['url'];
            $report->short_description = substr($post['long_description'], 0, 250);
            $report->save();
            $this->reportsdetailsDBUpdate($report->report_id, $post);
        }
        return redirect('allReports');
    }

    /*
     * ================================ 
     * 
     */

    public function getDeleteReport(Request $request) {
        if (isset($_GET['id'])) {
            $report_id = $_GET['id'];
            $this->reportsdetailsDelete($report_id);
            $report = FrontReport::find($report_id);
            $report->delete();
            flash('Report has been deleted successfully...', 'danger')->important();
        }
        return redirect('allReports');
    }

    /*
     * ================================ 
     * 
     */

    public function getUploadFile() {
        return view('report.uploadFile');
    }

    /*
     * ================================ 
     * 
     */

    public function postAddReport(Request $request) {
        $post = $request->all();
        $this->validate($request, Report::$reportRule);
        $report = new FrontReport();
        $report->report_title = $post['report_title'];
        $report->sub_category_id = $post['sub_category_id'];
        $report->publisher_id = $post['publisher_id'];
        $report->region_id = $post['region_id'];
        $report->report_date = $post['report_date'];
//        $report->report_pages = $post['report_pages'];
        $report->short_description = substr($this->cleanNonAsciiCharactersInString($post['long_description']), 0, 250);
//        $report->long_content = $post['long_content'];
//        $report->table_figures = $post['table_figures'];

        $url = $post['url'];

        if ($url == "") {
            $url = str_replace(" ", "-", $post['report_title']);
            $url = str_replace("(", "", $url);
            $url = str_replace(")", "", $url);
            $url = str_replace("$", "", $url);
            $url = str_replace("&", "", $url);
            $url = str_replace("!", "", $url);
            $url = str_replace("@", "", $url);
            $url = str_replace("#", "", $url);
            $url = str_replace("%", "", $url);
            $url = str_replace("^", "", $url);
            $url = str_replace("*", "", $url);
            $url = str_replace(":", "", $url);
            $url = str_replace('"', "", $url);
            $url = str_replace("?", "", $url);
            $url = str_replace(">", "", $url);
            $url = str_replace("<", "", $url);
            $url = str_replace(",", "", $url);
            $url = str_replace(".", "", $url);
            $url = str_replace("/", "", $url);
            $url = str_replace("[", "", $url);
            $url = str_replace("]", "", $url);
            $url = str_replace("|", "", $url);
            $url = str_replace("}", "", $url);
            $url = str_replace("{", "", $url);
        }
        $report->url = $url;

        if (isset($post['status'])) {
            $report->status = 1;
        } else {
            $report->status = 0;
        }
//        $report->single_price = $post['single_price'];
//        $report->corporate_price = $post['corporate_price'];
//        $report->enterprise_price = $post['enterprise_price'];
//        $report->meta_title = $post['meta_title'];
//        $report->meta_keywords = $post['meta_keywords'];
//        $report->meta_description = $post['meta_description'];
        $report->save();
        if ($report->report_id) {
            $this->reportsdetailsDB($report->report_id, $post);
            flash('Report has been added successfully', 'success')->important();
        }
        flash('Report has been added successfully', 'success')->important();
        return redirect('allReports');
    }

    /*
     * ================================ 
     * 
     */

    public function postUploadFile(Request $request) {
//        $this->validate($request, ["upload_file" => 'required|mimes:xlsx']);
        $file = Input::file('upload_file');
//        dd($file);
        Excel::load($file, function($reader) {
            $sheet = $reader->all();
//            dd($sheet);
            // foreach ($sheets as $sheet) {
//            $sheet=$sheets[0];
//             print_r($sheet['published_date']); die;
            foreach ($sheet as $row) {
                $report_title = $row->title;
                $exist = FrontReport::where('report_title', $report_title)->where('publisher_id', $row->publisher_id)->first();
//                dd(substr($this->cleanNonAsciiCharactersInString($row->long_description), 0, 250));
                if ($exist == null) {
                    if ($report_title != "") {
                        if ($row->long_description != "") {
                            $published_dates = explode(" ", $row->published_date);
                            $published_date = $published_dates[0];
                            $report = new FrontReport();

                            $url = str_replace(" ", "-", $row->title);

                            $url = preg_replace('#\s+#', '', trim($url));
                            $url = str_replace("(", "", $url);
                            $url = str_replace(")", "", $url);
                            $url = str_replace("$", "", $url);
                            $url = str_replace("&", "", $url);
                            $url = str_replace("!", "", $url);
                            $url = str_replace("@", "", $url);
                            $url = str_replace("#", "", $url);
                            $url = str_replace("%", "", $url);
                            $url = str_replace("^", "", $url);
                            $url = str_replace("*", "", $url);
                            $url = str_replace(":", "", $url);
                            $url = str_replace('"', "", $url);
                            $url = str_replace("?", "", $url);
                            $url = str_replace(">", "", $url);
                            $url = str_replace("<", "", $url);
                            $url = str_replace(",", "", $url);
                            $url = str_replace(".", "", $url);
                            $url = str_replace("/", "", $url);
                            $url = str_replace("[", "", $url);
                            $url = str_replace("]", "", $url);
                            $url = str_replace("|", "", $url);
                            $url = str_replace("}", "", $url);
                            $url = str_replace("{", "", $url);
                            $report->url = $url;
                            if ($row->is_active == 1) {
                                $report->status = 1;
                            } else {
                                $report->status = 0;
                            }
                            $report->report_title = $row->title;
                            if ($row->category_id != "") {
                                $report->sub_category_id = $row->category_id;
                            } else {
                                $report->sub_category_id = "15";
                            }
                            $report->publisher_id = $row->publisher_id;
                            $report->region_id = $row->region_id;
                            $report->report_date = $row->published_date;
                            $report->short_description = substr($this->cleanNonAsciiCharactersInString($row->long_description), 0, 250);
//                    $report->short_description = "";
                            $report->save();
                            if ($report->report_id) {
//                            $i++;
                                $this->reportsdetailsuploads($report->report_id, $row);
//                            flash('Report has been added successfully', 'success')->important();
                            }
                        }
                    } else {
                        return;
                        $report_id = $exist->report_id;
                        if ($report_id) {
                            $report = FrontReport::find($report_id);
                            $report->report_date = $row->published_date;
                            $report->short_description = substr($row->long_description, 0, 250);
                            $report->save();

                            $reportDetails = FrontReportdetail::where("report_id", $report_id)->first();
                            $reportDetails->long_content = $row->content;
                            $reportDetails->long_description = $row->long_description;
                            $reportDetails->report_pages = $row->number_of_pages;
                            $reportDetails->table_figures = $row->table_figures;
                            $reportDetails->single_price = $row->single_user_price;
                            $reportDetails->corporate_price = $row->multi_user_price;
                            $reportDetails->enterprise_price = $row->enterprise_user_price;
                            $reportDetails->meta_title = $row->meta_title;
                            $reportDetails->meta_keywords = $row->meta_keywords;
                            $reportDetails->meta_description = $row->meta_description;
                            $reportDetails->save();
                        }
                        flash($report_title, "danger");
                    }
                }
            }
        });
        return redirect('allReports');
    }

    /*
     * @function:reportsdetailsDBUpdate
     * @param:Request $request
     * @used to add data of FrontReportdetail in database FrontReportdetail table 
     */

    public function reportsdetailsuploads($report_id, $rarray) {
        $reportDetails = new FrontReportdetail();
        $reportDetails->report_id = $report_id;
        $reportDetails->long_content = $this->cleanNonAsciiCharactersInString($rarray['content']);
        $reportDetails->long_description = $this->cleanNonAsciiCharactersInString($rarray['long_description']);
        $reportDetails->report_pages = $rarray['number_of_pages'];
        $reportDetails->table_figures = $this->cleanNonAsciiCharactersInString($rarray['table_figures']);
        $reportDetails->single_price = $rarray['single_user_price'];
        $reportDetails->corporate_price = $rarray['multi_user_price'];
        $reportDetails->enterprise_price = $rarray['enterprise_user_price'];
        $reportDetails->meta_title = $this->cleanNonAsciiCharactersInString($rarray['meta_title']);
        $reportDetails->meta_keywords = $this->cleanNonAsciiCharactersInString($rarray['meta_keywords']);
        $reportDetails->meta_description = $this->cleanNonAsciiCharactersInString($rarray['meta_description']);
        $reportDetails->save();
    }

    /*
     * @function:reportsdetailsDelete
     * @param:Request $request
     * @used to delete reports from FrontReportdetail table
     */

    public function reportsdetailsDelete($report_id) {
        if (isset($report_id)) {
            $whereArray = array('report_id' => $report_id);
            return DB::table('report_details')->where($whereArray)->delete();
        }
    }

    /*
     * @function:reportsdetailsDBUpdate
     * @param:Request $request
     * @used to edit data of FrontReportdetail in database FrontReportdetail table 
     */

    public function reportsdetailsDBUpdate($report_id, $rarray) {
        if ($report_id) {
            $reportDetails = FrontReportdetail::where("report_id", $report_id)->first();
            $reportDetails->report_id = $report_id;
            $reportDetails->long_content = $rarray['long_content'];
            $reportDetails->long_description = $rarray['long_description'];
            $reportDetails->report_pages = $rarray['report_pages'];
            $reportDetails->table_figures = $rarray['table_figures'];
            $reportDetails->single_price = $rarray['single_price'];
            $reportDetails->corporate_price = $rarray['corporate_price'];
            $reportDetails->enterprise_price = $rarray['enterprise_price'];
            $reportDetails->meta_title = $rarray['meta_title'];
            $reportDetails->meta_keywords = $rarray['meta_keywords'];
            $reportDetails->meta_description = $rarray['meta_description'];
            $reportDetails->save();
            flash('Report Updated Successfully...', 'success');
        }
        return redirect('allReports');
    }

    /*
     * @function:reportsdetailsDBUpdate
     * @param:Request $request
     * @used to add data of FrontReportdetail in database FrontReportdetail table 
     */

    public function reportsdetailsDB($report_id, $rarray) {
        $reportDetails = new FrontReportdetail();
        $reportDetails->report_id = $report_id;
        $reportDetails->long_content = $rarray['long_content'];
        $reportDetails->long_description = $rarray['long_description'];
        $reportDetails->report_pages = $rarray['report_pages'];
        $reportDetails->table_figures = $rarray['table_figures'];
        $reportDetails->single_price = $rarray['single_price'];
        $reportDetails->corporate_price = $rarray['corporate_price'];
        $reportDetails->enterprise_price = $rarray['enterprise_price'];
        $reportDetails->meta_title = $rarray['meta_title'];
        $reportDetails->meta_keywords = $rarray['meta_keywords'];
        $reportDetails->meta_description = $rarray['meta_description'];
        $reportDetails->save();
    }

    /*
     * End here
     */

    /*
     * ================================ 
     * 
     */

    public function postPayment(Request $request) {
        $sub_categories = SubCategory::all();
        $post = $request->all();
        $report_id = $post['report_id'];
        if ($report_id > 665869) {
            $report = FrontReport::find($report_id);
        } else {

            $report = Report::find($report_id);
        }
        $type = $post['type'];
        $amount = $post['amount'];
        // print_r($sub_categories.$post.$report_id.$report.$type.$amount);
        // if($payment_way==1){

        return view('public.payment')->with('report', $report)->with('type', $type)->with('amount', $amount)->with('sub_categories', $sub_categories);
        // }
        // if($payment_way==2){
        //     return view('public.ebs1')->with('report',$report)->with('type',$type)->with('amount',$amount);
        // }
        // if($payment_way==2){ 
        //  $parameters = [
        //     'tid' => '1233221223322',
        //     'order_id' => '1232212',
        //     'amount' => $post['amount'],
        //     'report_id' => $post['report_id']
        //     ];
        //     $order = Indipay::gateway('EBS')->prepare($parameters);
        //     return Indipay::process($order);
        // }
    }

    /*
     * ================================ 
     * 
     */

    public function paymentGateway(Request $request) {
        $post = $request->all();
        $report_id = $post['report_id'];
        if ($report_id > 665869) {
            $report = FrontReport::find($report_id);
        } else {

            $report = Report::find($report_id);
        }
//        $report = Report::find($report_id);
        $type = $post['type'];

        $amount = $post['amount'];
        $payment_way = $post['payment_way'];

        $first_name = $request->first_name;
        $email = $request->email;
        $designation = $request->designation;
        $address = $request->address;
        $zip = $request->zip;
        $last_name = $request->last_name;
        $phone_no = $request->phone_no;
        $company = $request->company;
        $city = $request->city;
        $state = $request->state;
        $country = $request->country;
        $ip = $request->getClientIp();
        $url = $report->url;
        $report_title = $report->report_title;
        $pre = $request->pre;


        if ($payment_way == 1) {

            $object = array('first_name' => $first_name, 'email' => $email, 'designation' => $designation, 'address' => $address, 'zip' => $zip, 'last_name' => $last_name, 'phone_no' => $phone_no, 'company' => $company, 'city' => $city, 'source' => 'Papal', 'state' => $state, 'country' => $country, 'ip' => $ip, 'url' => $url, 'report_id' => $report_id, 'report_title' => $report_title, 'amount' => $amount, 'pre' => $pre);

            $this->sendHtmlMail4($object);

            return view('public.checkout')->with('report', $report)->with('type', $type)->with('amount', $amount)->with('post', $post);
        }
        if ($payment_way == 2) {

            $object = array('first_name' => $first_name, 'email' => $email, 'designation' => $designation, 'address' => $address, 'zip' => $zip, 'last_name' => $last_name, 'phone_no' => $phone_no, 'company' => $company, 'city' => $city, 'source' => 'Wire-Transfer', 'state' => $state, 'country' => $country, 'ip' => $ip, 'url' => $url, 'report_id' => $report_id, 'report_title' => $report_title, 'amount' => $amount, 'pre' => $pre);

            $this->sendHtmlMail4($object);
            $report = Report::with('subCategory')->orderBy('created_at', 'desc')->take(10)->get();
            return view('public.wireThankYou')->with('report_title', $report_title)->with('report', $report);
        }
    }

    /*
     * ================================ 
     * 
     */

    public function getThankyou(Request $request) {
//        dd($request);
//        $sub_categories = SubCategory::all();
//          dd($sub_categories);
//        $report = Report::with('subCategory')->orderBy('created_at', 'desc')->take(1)->get();
        $report = array();
        return view('public.thankYou')->with('report', $report);
    }

    /*
     * ================================ 
     * 
     */

    public function cleanNonAsciiCharactersInString($orig_text) {

        $text = $orig_text;
        $text = str_replace("\xE3", "", $text);
        $text = str_replace("\xC2", "", $text);
        $text = str_replace("\xA0or\xA0Li", "", $text);
        // Single letters
        $text = preg_replace("/[∂άαáàâãªä]/u", "a", $text);
        $text = preg_replace("/[∆лДΛдАÁÀÂÃÄ]/u", "A", $text);
        $text = preg_replace("/[ЂЪЬБъь]/u", "b", $text);
        $text = preg_replace("/[βвВ]/u", "B", $text);
        $text = preg_replace("/[çς©с]/u", "c", $text);
        $text = preg_replace("/[ÇС]/u", "C", $text);
        $text = preg_replace("/[δ]/u", "d", $text);
        $text = preg_replace("/[éèêëέëèεе℮ёєэЭ]/u", "e", $text);
        $text = preg_replace("/[ÉÈÊË€ξЄ€Е∑]/u", "E", $text);
        $text = preg_replace("/[₣]/u", "F", $text);
        $text = preg_replace("/[НнЊњ]/u", "H", $text);
        $text = preg_replace("/[ђћЋ]/u", "h", $text);
        $text = preg_replace("/[ÍÌÎÏ]/u", "I", $text);
        $text = preg_replace("/[íìîïιίϊі]/u", "i", $text);
        $text = preg_replace("/[Јј]/u", "j", $text);
        $text = preg_replace("/[ΚЌК]/u", 'K', $text);
        $text = preg_replace("/[ќк]/u", 'k', $text);
        $text = preg_replace("/[ℓ∟]/u", 'l', $text);
        $text = preg_replace("/[Мм]/u", "M", $text);
        $text = preg_replace("/[ñηήηπⁿ]/u", "n", $text);
        $text = preg_replace("/[Ñ∏пПИЙийΝЛ]/u", "N", $text);
        $text = preg_replace("/[óòôõºöοФσόо]/u", "o", $text);
        $text = preg_replace("/[ÓÒÔÕÖθΩθОΩ]/u", "O", $text);
        $text = preg_replace("/[ρφрРф]/u", "p", $text);
        $text = preg_replace("/[®яЯ]/u", "R", $text);
        $text = preg_replace("/[ГЃгѓ]/u", "r", $text);
        $text = preg_replace("/[Ѕ]/u", "S", $text);
        $text = preg_replace("/[ѕ]/u", "s", $text);
        $text = preg_replace("/[Тт]/u", "T", $text);
        $text = preg_replace("/[τ†‡]/u", "t", $text);
        $text = preg_replace("/[úùûüџμΰµυϋύ]/u", "u", $text);
        $text = preg_replace("/[√]/u", "v", $text);
        $text = preg_replace("/[ÚÙÛÜЏЦц]/u", "U", $text);
        $text = preg_replace("/[Ψψωώẅẃẁщш]/u", "w", $text);
        $text = preg_replace("/[ẀẄẂШЩ]/u", "W", $text);
        $text = preg_replace("/[ΧχЖХж]/u", "x", $text);
        $text = preg_replace("/[ỲΫ¥]/u", "Y", $text);
        $text = preg_replace("/[ỳγўЎУуч]/u", "y", $text);
        $text = preg_replace("/[ζ]/u", "Z", $text);

        // Punctuation
        $text = preg_replace("/[‚‚]/u", ",", $text);
        $text = preg_replace("/[`‛′’‘]/u", "'", $text);
        $text = preg_replace("/[″“”«»„]/u", '"', $text);
        $text = preg_replace("/[—–―−–‾⌐─↔→←]/u", '-', $text);
        $text = preg_replace("/[  ]/u", ' ', $text);

        $text = str_replace("…", "...", $text);
        $text = str_replace("≠", "!=", $text);
        $text = str_replace("≤", "<=", $text);
        $text = str_replace("≥", ">=", $text);
        $text = preg_replace("/[‗≈≡]/u", "=", $text);


        // Exciting combinations    
        $text = str_replace("ыЫ", "bl", $text);
        $text = str_replace("℅", "c/o", $text);
        $text = str_replace("₧", "Pts", $text);
        $text = str_replace("™", "tm", $text);
        $text = str_replace("№", "No", $text);
        $text = str_replace("Ч", "4", $text);
        $text = str_replace("‰", "%", $text);
        $text = preg_replace("/[∙•]/u", "*", $text);
        $text = str_replace("‹", "<", $text);
        $text = str_replace("›", ">", $text);
        $text = str_replace("‼", "!!", $text);
        $text = str_replace("⁄", "/", $text);
        $text = str_replace("∕", "/", $text);
        $text = str_replace("⅞", "7/8", $text);
        $text = str_replace("⅝", "5/8", $text);
        $text = str_replace("⅜", "3/8", $text);
        $text = str_replace("⅛", "1/8", $text);
        $text = preg_replace("/[‰]/u", "%", $text);
        $text = preg_replace("/[Љљ]/u", "Ab", $text);
        $text = preg_replace("/[Юю]/u", "IO", $text);
        $text = preg_replace("/[ﬁﬂ]/u", "fi", $text);
        $text = preg_replace("/[зЗ]/u", "3", $text);
        $text = str_replace("£", "(pounds)", $text);
        $text = str_replace("₤", "(lira)", $text);
        $text = preg_replace("/[‰]/u", "%", $text);
        $text = preg_replace("/[↨↕↓↑│]/u", "|", $text);
        $text = preg_replace("/[∞∩∫⌂⌠⌡]/u", "", $text);


        //2) Translation CP1252.
        $trans = get_html_translation_table(HTML_ENTITIES);
        $trans['f'] = '&fnof;';    // Latin Small Letter F With Hook
        $trans['-'] = array(
            '&hellip;', // Horizontal Ellipsis
            '&tilde;', // Small Tilde
            '&ndash;'       // Dash
        );
        $trans["+"] = '&dagger;';    // Dagger
        $trans['#'] = '&Dagger;';    // Double Dagger         
        $trans['M'] = '&permil;';    // Per Mille Sign
        $trans['S'] = '&Scaron;';    // Latin Capital Letter S With Caron        
        $trans['OE'] = '&OElig;';    // Latin Capital Ligature OE
        $trans["'"] = array(
            '&lsquo;', // Left Single Quotation Mark
            '&rsquo;', // Right Single Quotation Mark
            '&rsaquo;', // Single Right-Pointing Angle Quotation Mark
            '&sbquo;', // Single Low-9 Quotation Mark
            '&circ;', // Modifier Letter Circumflex Accent
            '&lsaquo;'  // Single Left-Pointing Angle Quotation Mark
        );

        $trans['"'] = array(
            '&ldquo;', // Left Double Quotation Mark
            '&rdquo;', // Right Double Quotation Mark
            '&bdquo;', // Double Low-9 Quotation Mark
        );

        $trans['*'] = '&bull;';    // Bullet
        $trans['n'] = '&ndash;';    // En Dash
        $trans['m'] = '&mdash;';    // Em Dash        
        $trans['tm'] = '&trade;';    // Trade Mark Sign
        $trans['s'] = '&scaron;';    // Latin Small Letter S With Caron
        $trans['oe'] = '&oelig;';    // Latin Small Ligature OE
        $trans['Y'] = '&Yuml;';    // Latin Capital Letter Y With Diaeresis
        $trans['euro'] = '&euro;';    // euro currency symbol
        ksort($trans);

        foreach ($trans as $k => $v) {
            $text = str_replace($v, $k, $text);
        }

        // 3) remove <p>, <br/> ...
        $text = strip_tags($text);

        // 4) &amp; => & &quot; => '
        $text = html_entity_decode($text);


        // transliterate
        // if (function_exists('iconv')) {
        // $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // }
        // remove non ascii characters
        // $text =  preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $text);      

        return $text;
    }

}
