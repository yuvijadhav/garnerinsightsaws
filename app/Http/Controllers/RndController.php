<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ReportUrl;

class RndController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($offset, $limit) {

        $reports = DB::table('reports')
                ->offset($offset)
                ->limit($limit)
                ->get();
        return $reports;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlocalData($offset) {

        $reports = DB::table('reports')
                ->where('report_id', '>=', $offset)
                ->get();
        return $reports;
    }

    public function insertDataFunction($offset) {
        $end = "";
//        for ($i = 0; $i < 50; $i++) {
        $rdata = $this->getlocalData($offset);
        if ($rdata) {
            foreach ($rdata as $key => $val) {
                $offset = $this->insertdatainreportUrlTable($val);
                $end = $offset;
            }
        }
//        }
        echo $end;
    }

    /*
     * ================================ 
     * 
     */

    public function insertdatainreportUrlTable($singleRecords) {


        foreach ($singleRecords as $key => $value) {
            $rarray[$key] = $value;
        }
        $reporturl = new ReportUrl();
        $reporturl->report_id = $rarray['report_id'];
        $reporturl->url = $rarray['url'];
        $reporturl->save();
    }

    /*
     * ================================ 
     * 
     */

    public function getlivedataold($offset, $limit) {
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
//            return json_decode($response);
            print_r(json_decode($response));
        }
    }

    /*
     * ================================ 
     * 
     */

    public function disconnectdb() {
        $queries = DB::connection('mysql');
//        $cl = DB::disconnect('mysql');
        dd($queries);
        dd($cl);
    }

}
