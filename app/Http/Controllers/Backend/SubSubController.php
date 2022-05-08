<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubController extends Controller
{
    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub_sub_categories = SubSubCategory::latest()->get();
        return view('backend.sub_sub_category.sub_sub_category_view', compact('sub_sub_categories', 'categories'));
    }
    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('sub_category_name_en','ASC')->get();
        return json_encode($subcat);
    }
}
