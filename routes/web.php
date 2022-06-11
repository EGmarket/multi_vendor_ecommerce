<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\MyCartPageController;
use App\Http\Controllers\User\WishlistController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('admin:admin')->group(function (){
    Route::get('admin/login',[AdminController::class,'loginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});

    // Admin All routes
Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');


// Admin Brand all routes
Route::prefix('brand')->group(function (){
    Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');
});

// Admin Category all routes
Route::prefix('category')->group(function (){
    Route::get('/view',[CategoryController::class,'CategoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');

    // Admin sub Category Routes
    Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('all.sub_category');
    Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('sub_category.store');
    Route::get('/sub/edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('sub_category.edit');
    Route::post('/sub/update',[SubCategoryController::class,'SubCategoryUpdate'])->name('sub_category.update');
    Route::get('/sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('sub_category.delete');

    // Admin sub sub category routes
    Route::get('/sub/sub/view',[SubSubController::class,'SubSubCategoryView'])->name('all.sub_sub_category');
    Route::get('/subcategory/ajax/{category_id}',[SubSubController::class,'GetSubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubSubController::class,'GetSubSubCategory']);
    Route::post('/sub/sub/store',[SubSubController::class,'SubSubCategoryStore'])->name('sub_sub_category.store');
    Route::get('/sub/sub/edit/{id}',[SubSubController::class,'SubSubCategoryEdit'])->name('sub_sub_category.edit');
    Route::post('/sub/sub/update',[SubSubController::class,'SubSubCategoryUpdate'])->name('sub_sub_category.update');
    Route::get('/sub/sub/delete/{id}',[SubSubController::class,'SubSubCategoryDelete'])->name('sub_sub_category.delete');
});

// Admin product all routes
Route::prefix('product')->group(function (){
    Route::get('/add',[ProductController::class,'AddProduct'])->name('add_product');
    Route::post('/store',[ProductController::class,'StoreProduct'])->name('product-store');
    Route::get('/manage',[ProductController::class,'ManageProduct'])->name('product-manage');
    Route::get('/edit/{id}',[ProductController::class,'EditProduct'])->name('product.edit');
    Route::get('/details/{id}',[ProductController::class,'DetailsProduct'])->name('product.details');
    Route::post('/data/update',[ProductController::class,'UpdateProductData'])->name('product-update');
    Route::post('/image/update',[ProductController::class,'MultiImgUpdate'])->name('update-product-image');
    Route::post('/thumbnail/update',[ProductController::class,'ThumbnailImgUpdate'])->name('update-product-thumbnail');
    Route::get('/multiimg/delete/{id}',[ProductController::class,'MultiImgDelete'])->name('product.multiImg.delete');
    Route::get('/inactive/{id}',[ProductController::class,'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}',[ProductController::class,'ProductActive'])->name('product.active');
    Route::get('/delete/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');

});

/*Admin Slider all Route*/
Route::prefix('slider')->group(function (){
    Route::get('/view',[SliderController::class,'SliderView'])->name('slider-manage');
    Route::post('/store',[SliderController::class,'SliderStore'])->name('slider.store');
    Route::get('/inactive/{id}',[SliderController::class,'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}',[SliderController::class,'SliderActive'])->name('slider.active');
    Route::get('/edit/{id}',[SliderController::class,'EditSlider'])->name('slider.edit');
    Route::post('/update',[SliderController::class,'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}',[SliderController::class,'SliderDelete'])->name('slider.delete');


});



// User all Route

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});

Route::get('/',[IndexController::class,'Index']);
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/update',[IndexController::class,'UserProfileUpdate'])->name('user.profile.update');
Route::get('/change/password',[IndexController::class,'ChangePassword'])->name('change.password');
Route::post('/user/password/update',[IndexController::class,'UserPasswordUpdate'])->name('update.password');

/*Frontend all routes goes here*/

/*Multi language routes*/
Route::get('/language/english',[LanguageController::class,'English'])->name('english.language');
Route::get('/language/bangla',[LanguageController::class,'Bangla'])->name('bangla.language');


/*Product details route*/
Route::get('/product/details/{id}/{slug}',[IndexController::class,'ProductDetails']);

/*Product tag page Route*/
Route::get('/product/tag/{tag}',[IndexController::class,'ProductTags']);

/*Category wise product route*/
Route::get('/subcategory/product/{subcat_id}/{slug}',[IndexController::class,'SubCatWiseProduct']);
/*SubSub Categorywise Product*/
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}',[IndexController::class,'SubSubCatWiseProduct']);

/*Product view Modal*/
Route::get('/product/view/modal/{id}',[IndexController::class,'ProductViewAjax']);

/*Add to Cart */
Route::post('/cart/data/store/{id}',[CartController::class,'AddToCart']);

/*Mini Cart*/
Route::get('/product/mini/cart/',[CartController::class,'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// product_wishlist route
// Add to Wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);



Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'],function(){
    // Wishlist page loaded
    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

});

/*-------------my All CartPage Route -----------------*/
Route::get('/mycart', [MyCartPageController::class, 'MyCart'])->name('mycart');
Route::get('/user/get-cart-product', [MyCartPageController::class, 'GetCartProduct']);
Route::get('/user/cart-remove/{rowId}', [MyCartPageController::class, 'RemoveCartProduct']);
Route::get('/cart-increment/{rowId}', [MyCartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [MyCartPageController::class, 'CartDecrement']);


/*--------------------------- Admin all coupon route section -------------------------*/

Route::prefix('coupons')->group(function (){
    Route::get('/view',[CouponController::class,'CouponView'])->name('coupon-manage');
    Route::post('/store',[CouponController::class,'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}',[CouponController::class,'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}',[CouponController::class,'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}',[CouponController::class,'CouponDelete'])->name('coupon.delete');
});

/*----------------------------------- Admin shipping area route section ------------------------*/

Route::prefix('shipping')->group(function (){
    Route::get('/division/view',[ShippingAreaController::class,'DivisionView'])->name('division-manage');

});

