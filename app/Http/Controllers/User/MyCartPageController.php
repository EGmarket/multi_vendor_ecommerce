<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class MyCartPageController extends Controller
{
    public function MyCart(){
        return view('frontend.wishlist.mycart_view');
    }/*end method*/

    public function GetCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts'=> $carts,
            'cartQty'=>$cartQty,
            'cartTotal'=>$cartTotal,

        ));

    }/*end method*/
}
