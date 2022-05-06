<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Image;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories =Category::orderBy('category_name_en','ASC')->get();
        $sub_categories = SubCategory::latest()->get();
        return view('backend.sub_category.sub_category_view',compact('sub_categories','categories'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id'=> 'required',
            'sub_category_name_en' => 'required',
            'sub_category_name_bn' => 'required',
        ],[
            'category_id.required' => 'Please select Any Option',
                'sub_category_name_bn.required' => 'Input SubCategory name Bangla'
            ]
        );

//        $img = $request->file('category_icon');
//        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
//        Image::make($img)->resize(300,300)->save('upload/sub_category/'.$name_gen);
//        $save_url = 'upload/sub_category/'.$name_gen;

        SubCategory::insert([
            'category_id' => $request->category_id,
            'sub_category_name_en'=> $request->sub_category_name_en,
            'sub_category_name_bn'=> $request->sub_category_name_bn,
            'sub_category_slug_en'=> strtolower(str_replace(' ','-',$request->sub_category_name_en)),
            'sub_category_slug_bn'=> str_replace(' ','-',$request->sub_category_name_bn),

        ]);
        $notification = array(
            'message' => 'Brand Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sub_categories = SubCategory::findOrFail($id);
        return view ('backend.sub_category.sub_category_edit', compact('sub_categories','categories'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'sub_category_name_en'=> $request->sub_category_name_en,
            'sub_category_name_bn'=> $request->sub_category_name_bn,
            'sub_category_slug_en'=> strtolower(str_replace(' ','-',$request->sub_category_name_en)),
            'sub_category_slug_bn'=> str_replace(' ','-',$request->sub_category_name_bn),

        ]);
        $notification = array(
            'message' => 'Brand Updated Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->route('all.sub_category')->with($notification);
    }
}
