<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller {
    /*
     * ================================ 
     * 
     */

    public function getAddNews() {
        return view('news.addBlog');
    }

    /*
     * ================================ 
     * 
     */

    public function postAddNews(Request $request) {
        $this->validate($request, News::$rules);
        $post = $request->all();

        $news = new News();
        $news->news_title = $post['news_title'];
        if (isset($request['news_image'])) {
            $image = $request->news_image->store('news-images');
            $news->news_image = $image;
        }
        $news->news_info = $post['news_info'];
        $news->news_url = $post['news_url'];
        $news->save();

        flash('Blog Added Successfully...', 'Success');
        return redirect('allBlogs');
    }

    //update category page
    /*
     * ================================ 
     * 
     */

    public function getEditNews(Request $request) {
        if (isset($_GET['id'])) {
            $news_id = $_GET['id'];
            $news = News::find($news_id);
            return view('news.editBlog')->with('news', $news);
        }
        return redirect('allBlogs');
    }

    // Post update category
    /*
     * ================================ 
     * 
     */

    public function postEditNews(Request $request) {
        $post = $request->all();
        $this->validate($request, News::$rules1);
        $news_id = $post['news_id'];
        //echo $post['category_id']; die;
        if ($news_id) {
            $news = News::find($news_id);
            $news->news_title = $post['news_title'];
            if (isset($request['news_image'])) {
                $image = $request->news_image->store('news-images');
                $news->news_image = $image;
            }
            $news->news_url = $post['news_url'];
            $news->news_info = $post['news_info'];
            $news->save();

            flash('Blog Updated Successfully...', 'Success');
        }
        return redirect('allBlogs');
    }

    /*
     * ================================ 
     * 
     */

    public function getAllNews(Request $request) {
        $data = News::take(10)->orderBy('updated_at', 'desc')->get();
        $total_count = News::count();
        return view('news.allBlogs')->with('data', $data)->with('total_count', $total_count);
    }

    //ajax
    /*
     * ================================ 
     * 
     */

    public function getNews(Request $request) {
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

    public function getDeleteNews(Request $request) {
        if (isset($_GET['id'])) {
            $news_id = $_GET['id'];
            $news = News::find($news_id);
            $news->delete();
            flash('Blog has been deleted successfully', 'danger')->important();
        }

        return redirect('allBlogs');
    }

}
