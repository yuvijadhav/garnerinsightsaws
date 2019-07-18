<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller {
    /*
     * ================================ 
     * 
     */

    public function getAddRegion(Request $request) {
        return view('region.addRegion');
    }

    /*
     * ================================ 
     * 
     */

    public function postAddRegion(Request $request) {
        $post = $request->all();
        $this->validate($request, Region::$regionRule);
        $region = new Region();
        $region->name = $post['name'];
        $region->save();
        flash('Region added successfully', 'success')->important();
        return redirect('allRegions');
    }

    /*
     * ================================ 
     * 
     */

    public function getAllRegions(Request $request) {
        $data = Region::get();
        $total_count = Region::count();
        return view('region.allRegions')->with('data', $data)->with('total_count', $total_count);
    }

    /*
     * ================================ 
     * 
     */

    public function getAllRegionsData(Request $request) {
        $post = $request->all();
        $page = $post['active_page'];
        $limit = $post['limit'];

        $total_count = Region::count();
        $data = Region::skip(($page - 1) * $limit)->take($limit)->orderBy('updated_at', 'desc')->get();
        $data = array("total_count" => $total_count, "data" => $data);
        return $data;
    }

    /*
     * ================================ 
     * 
     */

    public function getEditRegion(Request $request) {

        if (isset($_GET['id'])) {

            $region_id = $_GET['id'];

            $region = Region::where("region_id", $region_id)->first();

            return view('region.editRegion')->with('region', $region);
        }
        return redirect('allRegions');
    }

    /*
     * ================================ 
     * 
     */

    public function postEditRegion(Request $request) {
        $post = $request->all();
        $this->validate($request, Region::$regionRule);
        $region_id = $post['region_id'];

        if ($region_id) {
            $region = Region::where("region_id", $region_id)->first();
            $region->name = $post['name'];
            $region->save();

            flash('Region Updated Successfully...', 'Success');
        }
        return redirect('allRegions');
    }

    /*
     * ================================ 
     * 
     */

    public function getDeleteRegion(Request $request) {
        if (isset($_GET['id'])) {
            $region_id = $_GET['id'];
            $region = Region::find($region_id);
            $region->delete();
            flash('Region has been deleted successfully', 'danger')->important();
        }

        return redirect('allRegions');
    }

}
