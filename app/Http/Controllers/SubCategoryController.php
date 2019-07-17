<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;

class SubCategoryController extends Controller{
    
    public function getAddSubCategory(){
        return view('subCategory.addCategory');
    }

    public function postAddSubCategoty(Request $request){
        $this->validate($request,SubCategory::$rules);
        $post=$request->all();

        $sub_category=new SubCategory();       
        $sub_category->sub_category_name=$post['sub_category_name'];

        if(isset($request['sub_category_icon'])){
            $image=$request->sub_category_icon->store('sub_category-icon');
            $sub_category->sub_category_icon=$image;
        }

        if(isset($request['sub_category_image'])){
            $image=$request->sub_category_image->store('sub_category-images');
            $sub_category->sub_category_image=$image;
        }

        $sub_category->sub_category_description=$post['sub_category_description'];
        $sub_category->save();

        flash('Category Added Successfully...', 'Success');        
        return redirect('allCategories');
    }

    public function getAllSubCategories(Request $request){
        $data=SubCategory::orderBy('created_at','desc')->get();
        $total_count=SubCategory::count();        
        return view('subCategory.allCategories')->with('data', $data)->with('total_count',$total_count);
    }
        //ajax
    public function getSubCategory(Request $request){
        $post=$request->all();
        $page=$post['active_page'];
        $limit=$post['limit'];
        $total_count=SubCategory::count();
        $data=SubCategory::skip(($page-1)*$limit)->take($limit)->get();
        $data=array("total_count"=>$total_count,"data"=>$data);
        return $data;
    }

    //update sub category page
    public function getEditSubCategory(Request $request){
        if(isset($_GET['id'])){
            $sub_category_id=$_GET['id'];
            $sub_category=SubCategory::find($sub_category_id);
            return view('subCategory.editCategory')->with('sub_category',$sub_category);
        }
        return redirect('allCategories');
    }

    public function postEditSubCategory(Request $request){
        $post=$request->all();
        $this->validate($request,SubCategory::$rules1);
        $sub_category_id=$post['sub_category_id'];            
        //echo $post['category_id']; die;
        if($sub_category_id){                            
            $sub_category=SubCategory::find($sub_category_id);
            $sub_category->sub_category_name=$post['sub_category_name'];
            

            if(isset($request['sub_category_icon'])){
                $image=$request->sub_category_icon->store('sub_category-icon');
                $sub_category->sub_category_icon=$image;
            }

            if(isset($request['sub_category_image'])){
                $image=$request->sub_category_image->store('sub_category-images');
                $sub_category->sub_category_image=$image;
            }
            $sub_category->sub_category_description=$post['sub_category_description'];
            $sub_category->save();

            flash('Category Updated Successfully...', 'Success');  
        }
        return redirect('allCategories');
    }

    public function getDeleteSubCategories(Request $request){
        if(isset($_GET['id'])){
            $sub_category_id=$_GET['id'];
            $sub_category = Subcategory::find($sub_category_id);
            $sub_category->delete();
            flash('Category has been deleted successfully','danger')->important();
        }
        return redirect('allCategories');
    }
}
