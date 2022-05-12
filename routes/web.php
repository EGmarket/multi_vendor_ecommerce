<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubController;
use App\Http\Controllers\Frontend\IndexController;
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
