<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add',compact('categories','brands'));
    }

    public function StoreProduct(Request $request){

        $img = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/product/thumbnail/'.$name_gen);
        $save_url = 'upload/product/thumbnail/'.$name_gen;


        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_bn' => str_replace(' ','-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price'=> $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_bn' => $request->short_desc_bn,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_bn' => $request->long_desc_bn,
            'product_thumbnail' => $save_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

//        /------------------------------ Multiple Image Upload --------------------/
        $Multiimages = $request->file('multi_img');
        foreach ($Multiimages as $multiImg){
            $make_name = hexdec(uniqid()).'.'.$multiImg->getClientOriginalExtension();
            Image::make($multiImg)->resize(917,1000)->save('upload/product/multi_img/'.$make_name);
            $uploadPath = 'upload/product/multi_img/'.$make_name;
        }
        MultiImg::insert([
            'product_id'=>$product_id,
            'photo_name'=>$uploadPath,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Multi Image inserted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->route('product-manage')->with($notification);

    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }
    /* Edit product function*/
    public function EditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('categories','subcategories',
        'subsubcategories','brands','products','multiImgs'));
    }

    /* Product Details function*/
    public function DetailsProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_details',compact('categories','subcategories',
            'subsubcategories','brands','products','multiImgs'));
    }

    public function UpdateProductData(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_slug_bn' => str_replace(' ','-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price'=> $request->discount_price,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_bn' => $request->short_desc_bn,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_bn' => $request->long_desc_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'sub_SubCategory Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->route('product-manage')->with($notification);
    } /*end method*/

    /*multiImage Update*/
    public function MultiImgUpdate(Request $request){
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $multiImg){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()).'.'.$multiImg->getClientOriginalExtension();
            Image::make($multiImg)->resize(917,1000)->save('upload/product/multi_img/'.$make_name);
            $uploadPath = 'upload/product/multi_img/'.$make_name;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);

        } /* end foreach */
        $notification = array(
            'message' => 'sub_SubCategory Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } /*end method*/

    /* product Thumbnail update*/
    public function ThumbnailImgUpdate(Request $request){
        $pro_id = $request->id;
        $oldImg = $request->old_img;
        unlink($oldImg);

        $img = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/product/thumbnail/'.$name_gen);
        $save_url = 'upload/product/thumbnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'sub_SubCategory Insert Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } /* end Method*/

    /* multiImage Delete function started from here*/
    public function MultiImgDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } /* end Method*/

    /* Product active and inactive method started from here*/
    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } /* Product active and inactive method End here*/
    /* Product Delete method started from here*/
    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();
        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img){
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }
        $notification = array(
            'message' => 'Deleted Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    } /* end Method*/
}
