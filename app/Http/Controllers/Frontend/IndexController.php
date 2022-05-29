<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=','NULL')->orderBy('id','DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_brand_0 = Brand::skip(0)->first();
        $skip_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get();

        return view('frontend.index',compact('categories' ,'sliders','products','featured',
            'hot_deals','special_offer','skip_category_0','skip_product_0' , 'skip_brand_0', 'skip_product_1'));
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data['profile_photo_path']= $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Update Successfully done',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard',compact('data'))->with($notification);
    }

    public function ChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    } /*end method*/

    public function ProductDetails($id){
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_bn = $product->product_color_bn;
        $product_color_bn = explode(',',$color_bn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',',$size_bn);

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();


        return view('frontend.product.product_details', compact('product','product_color_en',
            'product_color_bn','product_size_en','product_size_bn','relatedProduct'));
    } /*End Method*/

    public function ProductTags($tag){
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_bn',$tag)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $allProducts = Product::orderBy('product_name_en','ASC')->get();
        /*$productColor = Product::where('status',1)->where('product_color_en',$tag)->where(
            'product_color_en',$tag)->orderBy('id','DESC')->get();*/
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        return view('frontend.body.tags_view',compact('products','categories','brands'));
    } /*end method*/

    /*Sub category wise data*/

    public function SubCatWiseProduct($subcat_id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        return view('frontend.product.subcategory_view',compact('products','categories','brands'));
    } /*end function*/

    public function SubSubCatWiseProduct($subsubcat_id,$slug){
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        return view('frontend.product.sub_subcategory_view',compact('products','categories','brands'));
    } /*end function*/

    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color_en = explode(',',$color);

        $size = $product->product_size_en;
        $product_size_en = explode(',',$size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color_en,
            'size' => $product_size_en
        ));

    } /*end function*/
}
