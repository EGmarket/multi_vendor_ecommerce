<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\WishList;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id){
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->selling_price,
                'weight'=> '1',
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'img' => $product->product_thumbnail,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on your cart']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->qty,
                'price' => $product->discount_price,
                'weight'=> '1',
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'img' => $product->product_thumbnail,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on your cart']);

        }


    } /*end method*/

    /*Mini cart section*/
    public function AddMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts'=> $carts,
            'cartQty'=>$cartQty,
            'cartTotal'=>$cartTotal,

        ));
    }


    /*End method*/

    /// remove mini cart
    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);

    } // end mehtod

    public function AddToWishlist(Request $request, $product_id){
        if (Auth::check()){
            $exists = WishList::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists){
                WishList::insert([
                    'user_id'=>Auth::id(),
                    'product_id'=>$product_id,
                    'created_at'=>Carbon::now(),
                ]);
                return response()->json(['success' => 'Product is add to your wishlist']);
            } else {
                return response()->json(['error' => 'This product is already on your wishlist']);
            }

        }else{
            return response()->json(['error' => 'Please login first to your account']);
        }

    } // end method

}
