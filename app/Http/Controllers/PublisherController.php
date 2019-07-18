<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller {

    //Show Add publisher page
    /*
     * ================================ 
     * 
     */

    public function getAddPublisher() {
        return view('publisher.addPublisher');
    }

    //Add publisher Data
    /*
     * ================================ 
     * 
     */

    public function postAddPublisher(Request $request) {

        $this->validate($request, Publisher::$rules);
        $post = $request->all();
        $publisher = new Publisher();
        $publisher->publisher_name = $post['publisher_name'];
        if (isset($post['publisher_image'])) {
            $image = $post['publisher_image']->store('publisher_images');
            $publisher->publisher_image = $image;
        }
        $publisher->save();
        flash('Publisher Added Successfully...', 'success');
        return redirect('allPublishers');
    }

    //All Publishers list
    /*
     * ================================ 
     * 
     */

    public function getAllPublishers() {
        $total_count = Publisher::count();
        $data = Publisher::orderBy('created_at', 'desc')->take(10)->get();
        return view('publisher.allPublishers')->with('data', $data)->with('total_count', $total_count);
    }

    /*
     * ================================ 
     * 
     */

    public function getAllPublishersData(Request $request) {
        $post = $request->all();
        $page = $post['active_page'];
        $limit = $post['limit'];

        $total_count = Publisher::count();
        $data = Publisher::skip(($page - 1) * $limit)->take($limit)->orderBy('updated_at', 'desc')->get();
        $data = array("total_count" => $total_count, "data" => $data);
        return $data;
    }

    //update category page
    /*
     * ================================ 
     * 
     */

    public function getEditPublisher(Request $request) {

        if (isset($_GET['id'])) {
            $publisher_id = $_GET['id'];
            $publisher = Publisher::find($publisher_id);
            return view('publisher.editPublisher')->with('publisher', $publisher);
        }
        return redirect('allPublishers');
    }

    // Post update Publisher
    /*
     * ================================ 
     * 
     */

    public function postEditPublisher(Request $request) {
        $post = $request->all();
        $this->validate($request, Publisher::$rules1);
        $publisher_id = $post['publisher_id'];
        //echo $post['category_id']; die;
        if ($publisher_id) {
            $publisher = Publisher::find($publisher_id);
            $publisher->publisher_name = $post['publisher_name'];
            if (isset($request['publisher_image'])) {
                $image = $request->publisher_image->store('publisher-images');
                $publisher->publisher_image = $image;
            }
            $publisher->save();

            flash('Publisher Updated Successfully...', 'Success');
        }
        return redirect('allPublishers');
    }

    /*
     * ================================ 
     * 
     */

    public function getDeletePublisher(Request $request) {
        if (isset($_GET['id'])) {
            $publisher_id = $_GET['id'];
            $publisher = Publisher::find($publisher_id);
            $publisher->delete();
            flash('Publisher has been deleted successfully', 'danger')->important();
        }

        return redirect('allPublishers');
    }

}
