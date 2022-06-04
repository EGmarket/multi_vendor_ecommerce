<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Auth;

class WishlistController extends Controller
{
   public function ViewWishlist(){
       return view('frontend.wishlist.wishlist_view');
   }/*end method*/

   public function GetWishlistProduct(){
       $wishlist = WishList::with('product')->where('user_id',Auth::id())->latest()->get();
       return response()->json($wishlist);

   } /*end Method*/
}
