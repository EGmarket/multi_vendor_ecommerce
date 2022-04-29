<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view',compact('categories'));
    }
    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ]);

        $img = $request->file('category_icon');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        Category::insert([
            'category_name_en'=> $request->category_name_en,
            'category_name_bn'=> $request->category_name_bn,
            'category_slug_en'=> strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_bn'=> str_replace(' ','-',$request->category_name_bn),
            'category_icon'=> $save_url,
        ]);
        $notification = array(
            'message' => 'Brand Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
        $categories = Category::findOrFail($id);
        return view ('backend.category.category_edit', compact('categories'));
    }

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;
        $old_img = $request->old_img;

        if ($request->file('category_icon')){
            unlink($old_img);
            $img = $request->file('category_icon');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;

            Category::findOrFail($category_id)->update([
                'category_name_en'=> $request->category_name_en,
                'category_name_bn'=> $request->category_name_en,
                'category_slug_en'=> strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_bn'=> str_replace(' ','-',$request->category_name_bn),
                'category_icon'=> $save_url,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully done',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);

        }else{
            Category::findOrFail($category_id)->update([
                'category_name_en'=> $request->category_name_en,
                'category_name_bn'=> $request->category_name_bn,
                'category_slug_en'=> strtolower(str_replace(' ','-',$request->category_name_en)),
                'category_slug_bn'=> str_replace(' ','-',$request->category_name_en),

            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully done',
                'alert-type' => 'success'
            );
            return redirect()->route('all.category')->with($notification);
        }

    }
}
