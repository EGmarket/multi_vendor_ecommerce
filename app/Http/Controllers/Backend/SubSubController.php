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

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
        ], [
                'category_id.required' => 'Please select Any Option',
                'subsubcategory_name_en.required' => 'Input SubCategory name Bangla'
            ]
        );

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ', '-', $request->subsubcategory_name_bn),

        ]);
        $notification = array(
            'message' => 'sub_SubCategory Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub_categories = SubCategory::orderBy('sub_category_name_en', 'ASC')->get();
        $sub_sub_categories = SubSubCategory::findOrFail($id);
        return view('backend.sub_sub_category.sub_sub_category_edit',compact('sub_sub_categories','categories','sub_categories'));
    }
    public function SubSubCategoryUpdate(Request $request){
        $subsubcat_id = $request->id;
        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ', '-', $request->subsubcategory_name_bn),

        ]);
        $notification = array(
            'message' => 'sub_SubCategory Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->route('all.sub_sub_category')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
