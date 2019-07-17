<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function getAddArticle(Request $request){
        return view('article.addPressRelease');
    }
    public function postAddArticle(Request $request){
        $post = $request->all();
        $this->validate($request,Article::$articleRule);
        $article = new Article();
        $article->article_title=$post['article_title'];
        if(isset($request['article_image'])){
            $image=$request->article_image->store('article-images');
            $article->article_image=$image;
        }
        $article->article_description=$post['article_description'];
        $article->article_url=$post['article_url'];
        $article->save();
        flash('Press release has been added successfully','success')->important();
        return redirect('allPressReleases');
    }

    public function getAllArticles(Request $request){
        $data = Article::orderBy('created_at','desc')->take(10)->get();
        $total_count = Article::count();
        return view('article.allPressReleases')->with('data',$data)->with('total_count', $total_count);
    }

    //ajax
    public function getArticlesData(Request $request){
        $post = $request->all();

        $page = $post['active_page'];
        $limit = $post['limit'];
        $total_count = Article::count();
        $data = Article::skip(($page-1)*$limit)->orderBy('updated_at','desc')->take($limit)->get();
        $data=array("total_count"=>$total_count,"data"=>$data);
        return $data;
    }

    public function getEditArticle(Request $request){
        if(isset($_GET['id'])){
            $article_id=$_GET['id'];
            $article=Article::find($article_id);
            return view('article.editPressRelease')->with('article',$article);
        }
        return redirect('editPressRelease');
    }

    public function postEditArticle(Request $request){
        $post=$request->all();
        $this->validate($request,Article::$articleRule1);
        $article_id=$post['article_id'];            
        
        if($article_id){                        
            $article=Article::find($article_id);
            $article->article_title=$post['article_title'];            
            if(isset($request['article_image'])){
                $image=$request->article_image->store('article-images');
                $article->article_image=$image;
            }
            $article->article_description=$post['article_description'];
            $article->article_url=$post['article_url'];
            $article->save();

            flash('Press Release Updated Successfully...', 'Success');  
        }
        return redirect('allPressReleases');
    }

    public function getDeleteArticle(Request $request){
        if(isset($_GET['id'])){
            $article_id=$_GET['id'];
            $article = Article::find($article_id);
            $article->delete();
            flash('Press release has been deleted successfully','danger')->important();
        }
        return redirect('allPressReleases');
    }
}
