<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_img' => 'required',
        ]);

        $img = $request->file('brand_img');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en'=> $request->brand_name_en,
            'brand_name_bn'=> $request->brand_name_bn,
            'brand_slug_en'=> strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_bn'=> str_replace(' ','-',$request->brand_name_bn),
            'brand_img'=> $save_url,
        ]);
        $notification = array(
            'message' => 'Brand Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id){
        $brands = Brand::findOrFail($id);
        return view ('backend.brand.brand_edit', compact('brands'));
    }

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_img;

        if ($request->file('brand_img')){
            unlink($old_img);
            $img = $request->file('brand_img');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en'=> $request->brand_name_en,
                'brand_name_bn'=> $request->brand_name_bn,
                'brand_slug_en'=> strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn'=> str_replace(' ','-',$request->brand_name_bn),
                'brand_img'=> $save_url,
            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully done',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);

        }else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_en'=> $request->brand_name_en,
                'brand_name_bn'=> $request->brand_name_bn,
                'brand_slug_en'=> strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn'=> str_replace(' ','-',$request->brand_name_bn),

            ]);
            $notification = array(
                'message' => 'Brand Updated Successfully done',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);
        }

    }
}
