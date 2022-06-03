<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

}
