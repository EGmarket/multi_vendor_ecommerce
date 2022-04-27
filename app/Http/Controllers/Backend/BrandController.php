<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

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
    }
}
