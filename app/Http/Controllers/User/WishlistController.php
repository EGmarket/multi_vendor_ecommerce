<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
   public function ViewWishlist(){
       return view('frontend.wishlist.wishlist_view');
   }

   public function GetWishlistProduct(){

   }
}
