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
     * @function:getAllReports
     * @param:Request $request
     * @used to Get all report 
     */

    public function getAllReports(Request $request) {
        $sub_categories = SubCategory::all();
        $table = DB::table('report_tables')->select('tablename', 'no_of_records')->where('status', 'inprogress')->first();
        $search = "";
        if (isset($request->search)) {
            $search = $request->search;
            $data = $data->where('report_titles', 'like', "%" . $search . "%");
        }
        if ($table) {
            if ($table->no_of_records) {
                $data = DB::table($table->tablename)
                        ->take(10)
                        ->orderBy('report_id', 'desc')
                        ->get();
                $cnt = 10 - $data->count();
                if ($cnt > 0) {
                    $tbl2 = 'report_' . (str_replace('report_', '', $table->tablename) - 1);
                    $data = DB::table($tbl2)
                            ->take($cnt)
                            ->orderBy('report_id', 'desc')
                            ->get();
                }
                $total_count = $table->no_of_records;
            } else {
                $tbl2 = 'report_' . (str_replace('report_', '', $table->tablename) - 1);
                $data = DB::table($tbl2)
                        ->take(10)
                        ->orderBy('report_id', 'desc')
                        ->get();
                $total_count = DB::table($tbl2)->where('status', '1')->count();
            }
        } else {
            $tbl = 'report';
            $data = DB::table($tbl)
                    ->take(10)
                    ->orderBy('report_id', 'desc')
                    ->get();
            $total_count = DB::table($tbl)->where('status', '1')->count();
        }
        return view('backend.reports.allReports')->with('sub_categories', $sub_categories)->with('data', $data)->with('total_count', $total_count)->with('search', $search);
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

        if ($search != "") {
            $data = $data->where('report_titles', 'like', "%" . $search . "%");
        }

        $table = DB::table('report_tables')->select('tablename', 'no_of_records')->where('status', 'inprogress')->first();
        if ($table->no_of_records) {
            $data = DB::table($table->tablename)
                    ->skip(($page - 1) * $limit)
                    ->take($limit)
                    ->orderBy('report_id', 'desc')
                    ->get();
            $total_count = $table->no_of_records;
        } else {
            $tbl2 = 'report_' . (str_replace('report_', '', $table->tablename) - 1);
            $data = DB::table($tbl2)
                    ->skip(($page - 1) * $limit)
                    ->take($limit)
                    ->orderBy('report_id', 'desc')
                    ->get();
            $total_count = DB::table($tbl2)->where('status', '1')->count();
        }
        $data = array("total_count" => $total_count, "data" => $data);
        return $data;
    }

    /*
     * Function : getAddReport
     * param:Request $request
     * Use To open Form for Single Report Add
     * Single Report Step 1
     */

    public function getAddReport(Request $request) {
        $report = array();
        $sub_category = SubCategory::all();
        $publisher = Publisher::all();
        $region = Region::all();
        return view('backend.reports.addReport')->with('report', $report)->with('sub_category', $sub_category)->with('publisher', $publisher)->with('region', $region);
    }

    /*
     * Function : postAddReport
     * param:Request $request
     * Use To Add Single Report 
     * * Single Report Step 2
     */

    public function postAddReport(Request $request) {
        $max = $this->getPostMaxSize();
        $post = $request->all();
//check which table is running in progress
        $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->first();
        $exist = DB::table('report_titles')->select('report_id', 'report_table')->where('report_title', $post['report_title'])->where('publisher_id', $post['publisher_id'])->first();
        if ($exist == null) {
            $this->validate($request, Report::$reportRule);
            $report = new FrontReport();
            $report->report_title = $post['report_title'];
            $report->sub_category_id = $post['sub_category_id'];
            $report->publisher_id = $post['publisher_id'];
            $report->region_id = $post['region_id'];
            $report->report_date = $post['report_date'];
            $report->short_description = substr($this->cleanNonAsciiCharactersInString($post['long_description']), 0, 250);
            if ($url == "") {
                $url = $this->getUrlTrims($post['report_title']);
            } else {
                $report->url = $post['url'];
            }
            if (isset($post['status'])) {
                $report->status = 1;
            } else {
                $report->status = 0;
            }
//table space check 
            if ($table->no_of_records >= 100) {
                $tbl = str_replace('report_', '', $table->tablename);
                $tbl = $tbl + 1;
                $tbl1 = 'report_' . $tbl;
                $tbl2 = 'report_details_' . $tbl;
                DB::table('report_tables')
                        ->where('tablename', $table->tablename)
                        ->update(['status' => 'completed']);
                $table_end = ($table->end) + 1;
                $sql1 = "CREATE TABLE `" . $tbl1 . "` ( `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL, `sub_category_id` int(10) unsigned NOT NULL, `publisher_id` int(10) unsigned NOT NULL, `region_id` int(10) unsigned NOT NULL, `report_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `short_description` longtext COLLATE utf8mb4_unicode_ci, `url` longtext COLLATE utf8mb4_unicode_ci, `status` int(11) NOT NULL DEFAULT '1', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`report_id`), KEY `report_sub_category_id_foreign` (`sub_category_id`), KEY `report_publisher_id_foreign` (`publisher_id`), KEY `report_region_id_foreign` (`region_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                $sql2 = "CREATE TABLE `" . $tbl2 . "` ( `id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_id` int(10) unsigned NOT NULL, `report_pages` int(11) DEFAULT NULL, `long_description` longtext COLLATE utf8mb4_unicode_ci, `long_content` longtext COLLATE utf8mb4_unicode_ci, `table_figures` longtext COLLATE utf8mb4_unicode_ci, `single_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `corporate_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `enterprise_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `meta_title` longtext COLLATE utf8mb4_unicode_ci, `meta_keywords` longtext COLLATE utf8mb4_unicode_ci, `meta_description` longtext COLLATE utf8mb4_unicode_ci, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), KEY `report_details_report_id_foreign` (`report_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                if (DB::statement($sql1)) {
                    DB::statement($sql2);
                }
                $tbl_id = DB::table('report_tables')->insertGetId(
                        ['tablename' => $tbl1, 'no_of_records' => 0, 'start' => $table_end, 'end' => $table_end]
                );
                $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->where('id', $tbl_id)->first();
// Insert records
                $id = $this->insertSingleReport($report, $table->tablename);

                if ($id) {
//Number of record increase 
                    $count = $table->no_of_records + 1;
                    DB::table('report_tables')
                            ->where('tablename', $table->tablename)
                            ->update(['end' => $id, 'no_of_records' => $count]);

                    DB::table('report_titles')->insert([
                        'report_id' => $id,
                        'report_title' => $report->report_title,
                        'report_table' => $table->tablename,
                        'publisher_id' => $report->publisher_id
                    ]);

                    $tbl = str_replace('report_', 'report_details_', $table->tablename);
                    $this->reportsdetailsDB($id, $post, $tbl);
                }

//End after Creating tables
            } else {
                $id = $this->insertSingleReport($report, $table->tablename);
                if ($id) {
//Number of record increase 
                    $count = $table->no_of_records + 1;
                    DB::table('report_tables')
                            ->where('tablename', $table->tablename)
                            ->update(['end' => $id, 'no_of_records' => $count]);

                    DB::table('report_titles')->insert([
                        'report_id' => $id,
                        'report_title' => $report->report_title,
                        'report_table' => $table->tablename,
                        'publisher_id' => $report->publisher_id
                    ]);

                    $tbl = str_replace('report_', 'report_details_', $table->tablename);
                    $this->reportsdetailsDB($id, $post, $tbl);
                }
            }
        } else {
            $report_id = $exist->report_id;
            $report_table = $exist->report_table;
            flash('Report Existing Report_ID - ' . $report_id . ' Please Edit This Report', 'danger')->important();
            return redirect('allReports');
        }

        flash('Report has been added successfully', 'success')->important();
        return redirect('allReports');
    }

    public function insertSingleReport($report, $tbl) {
        $id = DB::table($tbl)->insertGetId([
            'report_title' => $report->report_title,
            'sub_category_id' => $report->sub_category_id,
            'publisher_id' => $report->publisher_id,
            'region_id' => $report->region_id,
            'report_date' => $report->report_date,
            'short_description' => $report->short_description,
            'url' => $report->url,
            'status' => $report->status,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);
        return $id;
    }

    /*
     * @function:reportsdetailsDB Add Record
     * @param:Request $request
     * @used to add data of FrontReportdetail in database FrontReportdetail table 
     * * Single Report Step 3
     */

    public function reportsdetailsDB($report_id, $rarray, $tbl) {
        DB::table($tbl)->insert([
            'report_id' => $report_id,
            'long_content' => $rarray['long_content'],
            'long_description' => $rarray ['long_description'],
            'report_pages' => $rarray ['report_pages'],
            'table_figures' =>
            $rarray['table_figures'],
            'single_price' => $rarray ['single_price'],
            'corporate_price' =>
            $rarray['corporate_price'],
            'enterprise_price' => $rarray['enterprise_price'],
            'meta_title' => $rarray['meta_title'],
            'meta_keywords' => $rarray['meta_keywords'],
            'meta_description' => $rarray['meta_description'],
            'created_at' => date("   Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);
    }

    /*
     * End here
     */

    /*
     * Function : getUploadFile
     * param
     * Open Excel File Upload Form 
     * Upload Report Step 1
     */

    public function getUploadFile() {
        return view('backend.reports.uploadFile');
    }

    public function uploadsFilereporttable($sheet) {
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
                            $tbl = "report_details";
//                            $i++;
                            $this->reportsdetailsuploads($report->report_id, $row, $tbl);
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
    }

    /*
     * Function : postUploadFile
     * param    : Request $request
     * Excel File Uploaded 
     * Upload Report Step 2
     */

    public function postUploadFile(Request $request) {
        $file = Input::file('upload_file');
        Excel::load($file, function($reader) {
            $sheet = $reader->all();
            $sheetcount = count($sheet);
            $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->first();
            if ($table) {
                $spaceleft = abs(100 - $table->no_of_records); // {$spaceleft} number of space remain in inprogress table 
                if ($spaceleft >= $sheetcount) {
                    foreach ($sheet as $row) {
                        $report_title = $row->title;
                        $exist = DB::table('report_titles')->select('report_id', 'report_table')->where('report_title', $report_title)->where('publisher_id', $row->publisher_id)->first();
                        if ($exist == null) {
                            if ($report_title != "" && $row->long_description != "") {
                                $published_dates = explode(" ", $row->published_date);
                                $published_date = $published_dates[0];
                                $report = new FrontReport();
                                $url = $this->getUrlTrims($row->title);
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

                                $id = $this->insertSingleReport($report, $table->tablename);

                                if ($id) {
                                    $recordcount = DB::table('report_tables')->select('no_of_records')->where('tablename', $table->tablename)->first();
                                    $Rcount = $recordcount->no_of_records + 1;

                                    DB::table('report_titles')->insert([
                                        'report_id' => $id,
                                        'report_title' => $report->report_title,
                                        'report_table' => $table->tablename,
                                        'publisher_id' => $report->publisher_id
                                    ]);

                                    DB::table('report_tables')
                                            ->where('tablename', $table->tablename)
                                            ->update(['end' => $id, 'no_of_records' => $Rcount]);

                                    $tbl = str_replace('report_', 'report_details_', $table->tablename);
                                    $this->reportsdetailsuploads($id, $row, $tbl);
                                }
                            } else {
                                return;
//            If Title Exist in Table, Update Report Details Table
                                flash($report_title, "danger");
                            }
                        } else {
                            $this->reportExist($exist, $row);
                        }
                    }
                } else {
                    if ($spaceleft > 0) {
                        for ($i = 0; $i < $spaceleft; $i++) {
                            $report_title = $sheet[$i]['title'];
                            $exist = DB::table('report_titles')->select('report_id', 'report_table')->where('report_title', $report_title)->where('publisher_id', $sheet[$i]['publisher_id'])->first();
                            if ($exist == null) {
                                if ($report_title != "" && $sheet[$i]['long_description'] != "") {

                                    $published_dates = explode(" ", $sheet[$i]['published_date']);
                                    $published_date = $published_dates[0];
                                    $report = new FrontReport();
                                    $url = $this->getUrlTrims($sheet[$i]['title']);
                                    $report->url = $url;
                                    if ($sheet[$i]['is_active'] == 1) {
                                        $report->status = 1;
                                    } else {
                                        $report->status = 0;
                                    }
                                    $report->report_title = $sheet[$i]['title'];
                                    if ($sheet[$i]['category_id'] != "") {
                                        $report->sub_category_id = $sheet[$i]['category_id'];
                                    } else {
                                        $report->sub_category_id = "15";
                                    }
                                    $report->publisher_id = $sheet[$i]['publisher_id'];
                                    $report->region_id = $sheet[$i]['region_id'];
                                    $report->report_date = $sheet[$i]['published_date'];
                                    $report->short_description = substr($this->cleanNonAsciiCharactersInString($sheet[$i]['long_description']), 0, 250);

                                    $id = $this->insertSingleReport($report, $table->tablename);
                                    if ($id) {
                                        $recordcount = DB::table('report_tables')->select('no_of_records')->where('tablename', $table->tablename)->first();
                                        $Rcount = $recordcount->no_of_records + 1;

                                        DB::table('report_titles')->insert([
                                            'report_id' => $id,
                                            'report_title' => $report->report_title,
                                            'report_table' => $table->tablename,
                                            'publisher_id' => $report->publisher_id
                                        ]);

                                        DB::table('report_tables')
                                                ->where('tablename', $table->tablename)
                                                ->update(['end' => $id, 'no_of_records' => $Rcount]);

                                        $tbl = str_replace('report_', 'report_details_', $table->tablename);
                                        $this->reportsdetailsuploads($id, $sheet[$i], $tbl);
                                    }
                                } else {
                                    return;
                                }
                            } else {
                                $this->reportExist($exist, $sheet[$i]);
                            }
                        }

                        /*
                         * After Full the space Create the Report table
                         */

                        $limitrun = abs($sheetcount - $spaceleft);
                        if ($limitrun > 0) {
                            $tbl = str_replace('report_', '', $table->tablename);
                            $tbl = $tbl + 1;
                            $tbl1 = 'report_' . $tbl;
                            $tbl2 = 'report_details_' . $tbl;
                            $table_end = DB::table('report_tables')->select('end')->where('status', 'inprogress')->first();

                            DB::table('report_tables')
                                    ->where('tablename', $table->tablename)
                                    ->update(['status' => 'completed']);
                            $table_end = ($table_end->end) + 1;
                            $sql1 = "CREATE TABLE `" . $tbl1 . "` ( `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL, `sub_category_id` int(10) unsigned NOT NULL, `publisher_id` int(10) unsigned NOT NULL, `region_id` int(10) unsigned NOT NULL, `report_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `short_description` longtext COLLATE utf8mb4_unicode_ci, `url` longtext COLLATE utf8mb4_unicode_ci, `status` int(11) NOT NULL DEFAULT '1', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`report_id`), KEY `report_sub_category_id_foreign` (`sub_category_id`), KEY `report_publisher_id_foreign` (`publisher_id`), KEY `report_region_id_foreign` (`region_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                            $sql2 = "CREATE TABLE `" . $tbl2 . "` ( `id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_id` int(10) unsigned NOT NULL, `report_pages` int(11) DEFAULT NULL, `long_description` longtext COLLATE utf8mb4_unicode_ci, `long_content` longtext COLLATE utf8mb4_unicode_ci, `table_figures` longtext COLLATE utf8mb4_unicode_ci, `single_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `corporate_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `enterprise_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `meta_title` longtext COLLATE utf8mb4_unicode_ci, `meta_keywords` longtext COLLATE utf8mb4_unicode_ci, `meta_description` longtext COLLATE utf8mb4_unicode_ci, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), KEY `report_details_report_id_foreign` (`report_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                            if (DB::statement($sql1)) {
                                DB::statement($sql2);
                            }
                            $tbl_id = DB::table('report_tables')->insertGetId(
                                    ['tablename' => $tbl1, 'no_of_records' => 0, 'start' => $table_end, 'end' => $table_end]
                            );
                            $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->where('id', $tbl_id)->first();
                            for ($i = $spaceleft; $i < $limitrun; $i++) {
                                $report_title = $sheet[$i]['title'];
                                $exist = DB::table('report_titles')->select('report_id', 'report_table')->where('report_title', $report_title)->where('publisher_id', $sheet[$i]['publisher_id'])->first();
                                if ($exist == null) {
                                    if ($report_title != "" && $sheet[$i]['long_description'] != "") {
                                        $published_dates = explode(" ", $sheet[$i]['published_date']);
                                        $published_date = $published_dates[0];
                                        $report = new FrontReport();
                                        $url = $this->getUrlTrims($sheet[$i]['title']);
                                        $report->url = $url;
                                        if ($sheet[$i]['is_active'] == 1) {
                                            $report->status = 1;
                                        } else {
                                            $report->status = 0;
                                        }
                                        $report->report_title = $sheet[$i]['title'];
                                        if ($sheet[$i]['category_id'] != "") {
                                            $report->sub_category_id = $sheet[$i]['category_id'];
                                        } else {
                                            $report->sub_category_id = "15";
                                        }
                                        $report->publisher_id = $sheet[$i]['publisher_id'];
                                        $report->region_id = $sheet[$i]['region_id'];
                                        $report->report_date = $sheet[$i]['published_date'];
                                        $report->short_description = substr($this->cleanNonAsciiCharactersInString($sheet[$i]['long_description']), 0, 250);

                                        $id = $this->insertSingleReport($report, $table->tablename);
                                        if ($id) {
                                            $recordcount = DB::table('report_tables')->select('no_of_records')->where('tablename', $table->tablename)->first();
                                            $Rcount = $recordcount->no_of_records + 1;

                                            DB::table('report_titles')->insert([
                                                'report_id' => $id,
                                                'report_title' => $report->report_title,
                                                'report_table' => $table->tablename,
                                                'publisher_id' => $report->publisher_id
                                            ]);

                                            DB::table('report_tables')
                                                    ->where('tablename', $table->tablename)
                                                    ->update(['end' => $id, 'no_of_records' => $Rcount]);

                                            $tbl = str_replace('report_', 'report_details_', $table->tablename);
                                            $this->reportsdetailsuploads($id, $sheet[$i], $tbl);
                                        }
                                    } else {
                                        return;
                                    }
                                } else {
                                    $this->reportExist($exist, $sheet[$i]);
                                }
                            }
                        }
                    } else {
                        $tbl = str_replace('report_', '', $table->tablename);
                        $tbl = $tbl + 1;
                        $tbl1 = 'report_' . $tbl;
                        $tbl2 = 'report_details_' . $tbl;
                        $table_end = DB::table('report_tables')->select('end')->where('status', 'inprogress')->first();

                        DB::table('report_tables')
                                ->where('tablename', $table->tablename)
                                ->update(['status' => 'completed']);
                        $table_end = ($table_end->end) + 1;
                        $sql1 = "CREATE TABLE `" . $tbl1 . "` ( `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL, `sub_category_id` int(10) unsigned NOT NULL, `publisher_id` int(10) unsigned NOT NULL, `region_id` int(10) unsigned NOT NULL, `report_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `short_description` longtext COLLATE utf8mb4_unicode_ci, `url` longtext COLLATE utf8mb4_unicode_ci, `status` int(11) NOT NULL DEFAULT '1', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`report_id`), KEY `report_sub_category_id_foreign` (`sub_category_id`), KEY `report_publisher_id_foreign` (`publisher_id`), KEY `report_region_id_foreign` (`region_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                        $sql2 = "CREATE TABLE `" . $tbl2 . "` ( `id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_id` int(10) unsigned NOT NULL, `report_pages` int(11) DEFAULT NULL, `long_description` longtext COLLATE utf8mb4_unicode_ci, `long_content` longtext COLLATE utf8mb4_unicode_ci, `table_figures` longtext COLLATE utf8mb4_unicode_ci, `single_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `corporate_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `enterprise_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `meta_title` longtext COLLATE utf8mb4_unicode_ci, `meta_keywords` longtext COLLATE utf8mb4_unicode_ci, `meta_description` longtext COLLATE utf8mb4_unicode_ci, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), KEY `report_details_report_id_foreign` (`report_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                        if (DB::statement($sql1)) {
                            DB::statement($sql2);
                        }
                        $tbl_id = DB::table('report_tables')->insertGetId(
                                ['tablename' => $tbl1, 'no_of_records' => 0, 'start' => $table_end, 'end' => $table_end]
                        );
                        $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->where('id', $tbl_id)->first();
                        foreach ($sheet as $row) {
                            $report_title = $row->title;
                            $exist = DB::table('report_titles')->select('report_id', 'report_table')->where('report_title', $report_title)->where('publisher_id', $row->publisher_id)->first();
                            if ($exist == null) {
                                if ($report_title != "" && $row->long_description != "") {

                                    $published_dates = explode(" ", $row->published_date);
                                    $published_date = $published_dates[0];
                                    $report = new FrontReport();
                                    $url = $this->getUrlTrims($row->title);
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

                                    $id = $this->insertSingleReport($report, $table->tablename);

                                    if ($id) {
                                        $recordcount = DB::table('report_tables')->select('no_of_records')->where('tablename', $table->tablename)->first();
                                        $Rcount = $recordcount->no_of_records + 1;

                                        DB::table('report_titles')->insert([
                                            'report_id' => $id,
                                            'report_title' => $report->report_title,
                                            'report_table' => $table->tablename,
                                            'publisher_id' => $report->publisher_id
                                        ]);

                                        DB::table('report_tables')
                                                ->where('tablename', $table->tablename)
                                                ->update(['end' => $id, 'no_of_records' => $Rcount]);

                                        $tbl = str_replace('report_', 'report_details_', $table->tablename);
                                        $this->reportsdetailsuploads($id, $row, $tbl);
                                    }
                                } else {
                                    return;
                                }
                            } else {
                                $this->reportExist($exist, $row);
                            }
                        }
                    }
                }
            } else {
                $this->uploadsFilereporttable($sheet);
            }
        });
        return redirect('allReports');
    }

    /*
     * @function:reportsdetailsDBUpdate
     * @param:Request $request
     * @used to add data of FrontReportdetail in database FrontReportdetail table 
     * Upload Report Step 3
     */

    public function reportsdetailsuploads($report_id, $rarray, $tbl) {
        DB::table($tbl)->insert([
            'report_id' => $report_id,
            'long_content' => $this->cleanNonAsciiCharactersInString($rarray['content']),
            'long_description' => $this->cleanNonAsciiCharactersInString($rarray['long_description']),
            'report_pages' => $rarray['number_of_pages'],
            'table_figures' => $this->cleanNonAsciiCharactersInString($rarray['table_figures']),
            'single_price' => $rarray['single_user_price'],
            'corporate_price' => $rarray['multi_user_price'],
            'enterprise_price' => $rarray['enterprise_user_price'],
            'meta_title' => $this->cleanNonAsciiCharactersInString($rarray['meta_title']),
            'meta_keywords' => $this->cleanNonAsciiCharactersInString($rarray['meta_keywords']),
            'meta_description' => $this->cleanNonAsciiCharactersInString($rarray['meta_description']),
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")
        ]);
    }

    public function reportExist($exist, $row) {
        $report_id = $exist->report_id;
        if ($report_id) {
            DB::table($exist->report_table)
                    ->where('report_id', $report_id)
                    ->update([
                        'report_date' => $row->published_date,
                        'short_description' => substr($row->long_description, 0, 250),
                        'updated_at' => date("Y-m-d h:i:s")
            ]);
            $tbl = str_replace('report_', 'report_details_', $exist->report_table);
// Update Report Details table
            DB::table($tbl)
                    ->where('report_id', $report_id)
                    ->update([
                        'long_content' => $row->content,
                        'long_description' => $row->long_description,
                        'report_pages' => $row->number_of_pages,
                        'table_figures' => $row->table_figures,
                        'single_price' => $row->single_user_price,
                        'corporate_price' => $row->multi_user_price,
                        'enterprise_price' => $row->enterprise_user_price,
                        'meta_title' => $row->meta_title,
                        'meta_keywords' => $row->meta_keywords,
                        'meta_description' => $row->meta_description,
                        'updated_at' => date("Y-m-d h:i:s")
            ]);
        }
    }

    /*
     * ================================ 
     * 
     */

    public function getEditReport(Request $request) {
        if (isset($_GET['id'])) {
            $report_id = $_GET['id'];
            $sub_category = SubCategory::all();
            $publisher = Publisher::all();
            $region = Region::all();
            $report_tbl = DB::table('report_titles')->select('report_table')->where("report_id", $report_id)->first();

            $report = DB::table($report_tbl->report_table)->where("report_id", $report_id)->first();
            $tbl2 = str_replace('report_', 'report_details_', $report_tbl->report_table);
            $reportDetails = DB::table($tbl2)->where("report_id", $report_id)->first();

            return view('backend.reports.editReport')->with('report', $report)->with("reportDetails", $reportDetails)->with('sub_category', $sub_category)->with('publisher', $publisher)->with('region', $region);
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
        $report_tbl = DB::table('report_titles')->select('report_table')->where("report_id", $report_id)->first();
        $tbl2 = str_replace('report_', 'report_details_', $report_tbl->report_table);

        if ($report_id) {
            $report = DB::table($report_tbl->report_table)->where("report_id", $report_id)->first();

            $this->validate($request, FrontReport::$editRule);
            $this->validate($request, ['report_title' => 'unique:reports,report_title,' . $report_id . ',report_id']);
            if (isset($post['status'])) {
                $report->status = 1;
            } else {
                $report->status = 0;
            }

            DB::table($report_tbl->report_table)
                    ->where('report_id', $report_id)
                    ->update([
                        'report_title' => $post['report_title'],
                        'sub_category_id' => $post['sub_category_id'],
                        'publisher_id' => $post['publisher_id'],
                        'region_id' => $post['region_id'],
                        'report_date' => $post['report_date'],
                        'status' => $report->status,
                        'url' => $post['url'],
                        'short_description' => substr($post['long_description'], 0, 250),
                        'updated_at' => date("Y-m-d h:i:s")
            ]);
            $this->reportsdetailsDBUpdate($report->report_id, $post, $tbl2);
        }
        return redirect('allReports');
    }

    /*
     * @function:reportsdetailsDBUpdate
     * @param:Request $request
     * @used to edit data of FrontReportdetail in database FrontReportdetail table 
     */

    public function reportsdetailsDBUpdate($report_id, $rarray, $tbl2) {
        if ($report_id) {
            DB::table($tbl2)
                    ->where('report_id', $report_id)
                    ->update([
                        'long_content' => $rarray['long_content'],
                        'long_description' => $rarray['long_description'],
                        'report_pages' => $rarray['report_pages'],
                        'table_figures' => $rarray['table_figures'],
                        'single_price' => $rarray['single_price'],
                        'corporate_price' => $rarray['corporate_price'],
                        'enterprise_price' => $rarray['enterprise_price'],
                        'meta_title' => $rarray['meta_title'],
                        'meta_keywords' => $rarray['meta_keywords'],
                        'meta_description' => $rarray['meta_description'],
                        'updated_at' => date("Y-m-d h:i:s")
            ]);
            flash('Report Updated Successfully...', 'success');
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
            $report_tbl = DB::table('report_titles')->select('report_table')->where("report_id", $report_id)->first();
            $tbl2 = str_replace('report_', 'report_details_', $report_tbl->report_table);

            DB::table('report_titles')->where('report_id', $report_id)->delete();
            DB::table($report_tbl->report_table)->where('report_id', $report_id)->delete();
            DB::table($tbl2)->where('report_id', $report_id)->delete();

            $r_tables = DB::table('report_tables')->select('tablename', 'no_of_records')->where("tablename", $report_tbl->report_table)->first();
            $count = $r_tables->no_of_records - 1;
            DB::table('report_tables')
                    ->where('tablename', $report_tbl->report_table)
                    ->update(['no_of_records' => $count]);
            flash('Report has been deleted successfully...', 'danger')->important();
        }
        return redirect('allReports');
    }

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
        return view('public.payment')->with('report', $report)->with('type', $type)->with('amount', $amount)->with('sub_categories', $sub_categories);
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
        $report = array();
        return view('public.thankYou')->with('report', $report);
    }

    /*
     * ================================ 
     * 
     */

    public function getUrlTrims($url) {

        $url = str_replace(" ", "-", $url);
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
        return $url;
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
        return $text;
    }

    public function getlivedata($offset, $limit) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://garnerinsights.com/api/reportdata/" . $offset . "/" . $limit,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 300000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
// Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
//            dd(json_decode($response));
        }
    }

    public function reportoptimization($limit) {
        $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->first();
        $offset = $table->end;
        $repotdata = $this->getlivedata($offset, $limit);
        if ($repotdata) {
            foreach ($repotdata as $key => $val) {
                $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->first();
                if ($table->no_of_records >= 150000
                ) {
                    $tbl = str_replace('report_', '', $table->tablename);
                    $tbl = $tbl + 1;
                    $tbl1 = 'report_' . $tbl;
                    $tbl2 = 'report_details_' . $tbl;
                    DB::table('report_tables')
                            ->where('tablename', $table->tablename)
                            ->update(['status' => 'completed']);
                    $table_end = ($table->end) + 1;
                    $sql1 = "CREATE TABLE `" . $tbl1 . "` ( `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL, `sub_category_id` int(10) unsigned NOT NULL, `publisher_id` int(10) unsigned NOT NULL, `region_id` int(10) unsigned NOT NULL, `report_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `short_description` longtext COLLATE utf8mb4_unicode_ci, `url` longtext COLLATE utf8mb4_unicode_ci, `status` int(11) NOT NULL DEFAULT '1', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`report_id`), KEY `report_sub_category_id_foreign` (`sub_category_id`), KEY `report_publisher_id_foreign` (`publisher_id`), KEY `report_region_id_foreign` (`region_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                    $sql2 = "CREATE TABLE `" . $tbl2 . "` ( `id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_id` int(10) unsigned NOT NULL, `report_pages` int(11) DEFAULT NULL, `long_description` longtext COLLATE utf8mb4_unicode_ci, `long_content` longtext COLLATE utf8mb4_unicode_ci, `table_figures` longtext COLLATE utf8mb4_unicode_ci, `single_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `corporate_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `enterprise_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `meta_title` longtext COLLATE utf8mb4_unicode_ci, `meta_keywords` longtext COLLATE utf8mb4_unicode_ci, `meta_description` longtext COLLATE utf8mb4_unicode_ci, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), KEY `report_details_report_id_foreign` (`report_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
                    if (DB::statement($sql1)) {
                        DB::statement($sql2);
                    }
                    $tbl_id = DB::table('report_tables')->insertGetId(
                            ['tablename' => $tbl1, 'no_of_records' => 0, 'start' => $table_end, 'end' => $table_end, 'status' => 'inprogress']
                    );
                    $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->first();
                    $val->short_description = substr($this->cleanNonAsciiCharactersInString($val->long_description), 0, 250);
                    $exist = DB::table('report_titles')->select('report_id', 'report_table')->where('report_title', $val->report_title)->where('publisher_id', $val->publisher_id)->first();
                    if ($exist == null) {
                        $this->insertSingleReportBreak($val, $table->tablename);
                        $count = $table->no_of_records + 1;
                        DB::table('report_tables')
                                ->where('tablename', $table->tablename)
                                ->update(['end' => $val->report_id, 'no_of_records' => $count]);
                        DB::table('report_titles')->insert([
                            'report_id' => $val->report_id,
                            'report_title' => $val->report_title,
                            'report_table' => $table->tablename,
                            'publisher_id' => $val->publisher_id
                        ]);
                        $tbl = str_replace('report_', 'report_details_', $table->tablename);
                        $this->reportsdetailsBreak($val, $tbl);
                    }
                } else {
                    $exist = DB::table('report_titles')->select('report_id', 'report_table')->where('report_title', $val->report_title)->where('publisher_id', $val->publisher_id)->first();
                    if ($exist == null) {
                        $val->short_description = substr($this->cleanNonAsciiCharactersInString($val->long_description), 0, 250);
                        $this->insertSingleReportBreak($val, $table->tablename);
                        $count = $table->no_of_records + 1;

                        $tbl = str_replace('report_', '', $table->tablename);
                        DB::table('report_titles')->insert([
                            'report_id' => $val->report_id,
                            'report_title' => $val->report_title,
                            'report_table' => $table->tablename,
                            'publisher_id' => $val->publisher_id
                        ]);
                        DB::table('report_tables')
                                ->where('tablename', $table->tablename)
                                ->update(['end' => $val->report_id, 'no_of_records' => $count]);
                        $tbl = str_replace('report_', 'report_details_', $table->tablename);
                        $this->reportsdetailsBreak($val, $tbl);
                    }
//                    dd(__LINE__);
                }
            }
        }
    }

    public function ReportsBreak() {
        $limit = 100000;

        for ($i = 1; $i <= 2; $i++) {
            $tbl1 = 'report_' . $i;
            $tbl2 = 'report_details_' . $i;
            $autoinc = ($limit * $i) + 1;
            $sql1 = "CREATE TABLE `" . $tbl1 . "` ( `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL, `sub_category_id` int(10) unsigned NOT NULL, `publisher_id` int(10) unsigned NOT NULL, `region_id` int(10) unsigned NOT NULL, `report_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `short_description` longtext COLLATE utf8mb4_unicode_ci, `url` longtext COLLATE utf8mb4_unicode_ci, `status` int(11) NOT NULL DEFAULT '1', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`report_id`), KEY `report_sub_category_id_foreign` (`sub_category_id`), KEY `report_publisher_id_foreign` (`publisher_id`), KEY `report_region_id_foreign` (`region_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $autoinc . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
            $sql2 = "CREATE TABLE `" . $tbl2 . "` ( `id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_id` int(10) unsigned NOT NULL, `report_pages` int(11) DEFAULT NULL, `long_description` longtext COLLATE utf8mb4_unicode_ci, `long_content` longtext COLLATE utf8mb4_unicode_ci, `table_figures` longtext COLLATE utf8mb4_unicode_ci, `single_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `corporate_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `enterprise_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `meta_title` longtext COLLATE utf8mb4_unicode_ci, `meta_keywords` longtext COLLATE utf8mb4_unicode_ci, `meta_description` longtext COLLATE utf8mb4_unicode_ci, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), KEY `report_details_report_id_foreign` (`report_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $autoinc . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
            if (DB::statement($sql1)) {
                DB::statement($sql2);
            }
            $tbl_id = DB::table('report_tables')->insertGetId(
                    ['tablename' => 'report_' . $i, 'no_of_records' => 0, 'start' => ($limit * $i) + 1, 'end' => ($limit * $i) + 1]
            );
            $table = DB::table('report_tables')->select('tablename', 'no_of_records', 'start', 'end', 'status')->where('status', 'inprogress')->where('id', $tbl_id)->first();

            for ($j = 0; $j < 10; $j++) {
                $data = DB::table('reports')
                        ->skip(($j * $i) * 10000)
                        ->take(10000)
                        ->get();
                if ($data) {
                    foreach ($data as $row) {
                        $row->short_description = substr($this->cleanNonAsciiCharactersInString($row->long_description), 0, 250);
                        $this->insertSingleReportBreak($row, $table->tablename);
//Number of record increase 
                        $count = $table->no_of_records + 1;
                        DB::table('report_tables')
                                ->where('tablename', $table->tablename)
                                ->update(['end' => $row->report_id, 'no_of_records' => $count]);

                        DB::table('report_titles')->insert([
                            'report_id' => $row->report_id,
                            'report_title' => $row->report_title,
                            'report_table' => $table->tablename,
                            'publisher_id' => $row->publisher_id
                        ]);

                        $tbl = str_replace('report_', 'report_details_', $table->tablename);
                        $this->reportsdetailsBreak($row, $tbl);
                    }
                }
            }
        }
    }

    public function insertSingleReportBreak($report, $tbl) {
        DB::table($tbl)->insert([
            'report_id' => $report->report_id,
            'report_title' => $report->report_title,
            'sub_category_id' => $report->sub_category_id,
            'publisher_id' => $report->publisher_id,
            'region_id' => $report->region_id,
            'report_date' => $report->report_date,
            'short_description' => $report->short_description,
            'url' => $report->url,
            'status' => $report->status,
            'created_at' => $report->created_at,
            'updated_at' => $report->updated_at
        ]);
    }

    public function reportsdetailsBreak($rarray, $tbl) {
        DB::table($tbl)->insert([
            'report_id' => $rarray->report_id,
            'long_content' => $rarray->long_content,
            'long_description' => $rarray->long_description,
            'report_pages' => $rarray->report_pages,
            'table_figures' => $rarray->table_figures,
            'single_price' => $rarray->single_price,
            'corporate_price' => $rarray->corporate_price,
            'enterprise_price' => $rarray->enterprise_price,
            'meta_title' => $rarray->meta_title,
            'meta_keywords' => $rarray->meta_keywords,
            'meta_description' => $rarray->meta_description,
            'created_at' => $rarray->created_at,
            'updated_at' => $rarray->updated_at
        ]);
    }

    public function createTables($t1, $table_end) {
        $tbl1 = "report_" . $t1;
        $tbl2 = "report_details_" . $t1;
        $sql1 = "CREATE TABLE `" . $tbl1 . "` ( `report_id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL, `sub_category_id` int(10) unsigned NOT NULL, `publisher_id` int(10) unsigned NOT NULL, `region_id` int(10) unsigned NOT NULL, `report_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `short_description` longtext COLLATE utf8mb4_unicode_ci, `url` longtext COLLATE utf8mb4_unicode_ci, `status` int(11) NOT NULL DEFAULT '1', `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`report_id`), KEY `report_sub_category_id_foreign` (`sub_category_id`), KEY `report_publisher_id_foreign` (`publisher_id`), KEY `report_region_id_foreign` (`region_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        $sql2 = "CREATE TABLE `" . $tbl2 . "` ( `id` int(10) unsigned NOT NULL AUTO_INCREMENT, `report_id` int(10) unsigned NOT NULL, `report_pages` int(11) DEFAULT NULL, `long_description` longtext COLLATE utf8mb4_unicode_ci, `long_content` longtext COLLATE utf8mb4_unicode_ci, `table_figures` longtext COLLATE utf8mb4_unicode_ci, `single_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `corporate_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `enterprise_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL, `meta_title` longtext COLLATE utf8mb4_unicode_ci, `meta_keywords` longtext COLLATE utf8mb4_unicode_ci, `meta_description` longtext COLLATE utf8mb4_unicode_ci, `created_at` timestamp NULL DEFAULT NULL, `updated_at` timestamp NULL DEFAULT NULL, PRIMARY KEY (`id`), KEY `report_details_report_id_foreign` (`report_id`) ) ENGINE=InnoDB AUTO_INCREMENT=" . $table_end . " DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
        if (DB::statement($sql1)) {
            DB::statement($sql2);
        }
    }

}
