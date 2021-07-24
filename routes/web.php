<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/



//Auth::routes();
Auth::routes(['register'=>false]);
//Route::get('/home', 'HomeController@index')->name('home');


##################################################################
###############                           ########################
############### Admin Home Page and Login Page Route #############
###############                           ########################
##################################################################

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'authenticate'])->name('login');
//Route::post('/login','AuthController@authenticate');


##################################################################
###############                           ########################
############### Admin Add Category Route  ########################
###############                           ########################
##################################################################
Route::get('admin/category', [App\Http\Controllers\CategoryController::class,'create'])->name('catcreate');
Route::post('admin/category', [App\Http\Controllers\CategoryController::class,'store'])->name('catstore');
Route::get('admin/category/catshow', [App\Http\Controllers\CategoryController::class,'index'])->name('catshow');
Route::delete('admin/category/destroy/{id}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('catdestroy');

Route::get('admin/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('catedit');
Route::patch('admin/category/update/{id}',[App\Http\Controllers\CategoryController::class,'update'])->name('catupdate');


##################################################################
###############                           ########################
############### Admin Add Brand Route  ########################
###############                           ########################
##################################################################
Route::get('admin/brand', [App\Http\Controllers\BrandController::class,'create'])->name('brandcreate');
Route::post('admin/brand', [App\Http\Controllers\BrandController::class,'store'])->name('brandstore');
Route::get('admin/brand/brandshow', [App\Http\Controllers\BrandController::class,'index'])->name('brandshow');
Route::delete('admin/brand/destroy/{id}',[App\Http\Controllers\BrandController::class,'destroy'])->name('branddestroy');

Route::get('admin/brand/edit/{id}',[App\Http\Controllers\BrandController::class,'edit'])->name('brandedit');

Route::patch('admin/brand/update/{id}',[App\Http\Controllers\BrandController::class,'update'])->name('brandupdate');



##################################################################
###############                           ########################
############### Admin Add Country Route  ########################
###############                           ########################
##################################################################
Route::get('admin/country', [App\Http\Controllers\CountryController::class,'create'])->name('coutcreate');
Route::post('admin/country', [App\Http\Controllers\CountryController::class,'store'])->name('coutstore');
Route::get('admin/country/countryshow', [App\Http\Controllers\CountryController::class,'index'])->name('coutshow');
Route::delete('admin/country/destroy/{id}',[App\Http\Controllers\CountryController::class,'destroy'])->name('coutdestroy');
Route::get('admin/country/edit/{id}',[App\Http\Controllers\CountryController::class,'edit'])->name('coutedit');
Route::patch('admin/country/update/{id}',[App\Http\Controllers\CountryController::class,'update'])->name('coutupdate');


##################################################################
###############                           ########################
############### Admin Add Subcategory Route  #####################
###############                           ########################
##################################################################
Route::get('admin/subcat', [App\Http\Controllers\SubcategoryController::class,'create'])->name('subcreate');
Route::post('admin/subcat', [App\Http\Controllers\SubcategoryController::class,'store'])->name('substore');
Route::get('admin/subcat/subshow', [App\Http\Controllers\SubcategoryController::class,'index'])->name('subshow');
Route::delete('admin/subcat/destroy/{id}',[App\Http\Controllers\SubcategoryController::class,'destroy'])->name('subdestroy');
Route::get('admin/subcat/edit/{id}',[App\Http\Controllers\SubcategoryController::class,'edit'])->name('subedit');
Route::patch('admin/subcat/update/{id}',[App\Http\Controllers\SubcategoryController::class,'update'])->name('subupdate');



Route::post('gettype',[App\Http\Controllers\SubcategoryController::class,'getType'])->name('getType');


##################################################################
###############                           ########################
############### Admin Add City Route      ########################
###############                           ########################
##################################################################
Route::get('admin/city', [App\Http\Controllers\CityController::class,'create'])->name('citycreate');
Route::post('admin/city', [App\Http\Controllers\CityController::class,'store'])->name('citystore');
Route::get('admin/city/cityshow', [App\Http\Controllers\CityController::class,'index'])->name('cityshow');
Route::delete('admin/city/destroy/{id}',[App\Http\Controllers\CityController::class,'destroy'])->name('citydestroy');
Route::get('admin/city/edit/{id}',[App\Http\Controllers\CityController::class,'edit'])->name('cityedit');
Route::patch('admin/city/update/{id}',[App\Http\Controllers\CityController::class,'update'])->name('cityupdate');


##################################################################
###############                           ########################
############### Admin Approval Retailer Route      ###############
###############                           ########################
##################################################################

Route::get('admin/approveretailer', [App\Http\Controllers\ApprovalRetailerController::class,'create'])->name('retailercreate');
Route::post('admin/approveretailer', [App\Http\Controllers\ApprovalRetailerController::class,'store'])->name('retailerstore');

Route::get('admin/approveretailer/retailershow', [App\Http\Controllers\ApprovalRetailerController::class,'index'])->name('retailershow');

Route::delete('admin/approveretailer/destroy/{id}',[App\Http\Controllers\ApprovalRetailerController::class,'destroy'])->name('retailerdestroy');
Route::get('admin/approveretailer/edit/{id}',[App\Http\Controllers\ApprovalRetailerController::class,'edit'])->name('retaileredit');
Route::post('admin/approveretailer/update/{id}',[App\Http\Controllers\ApprovalRetailerController::class,'update'])->name('retailerupdate');



Route::post('getcity',[App\Http\Controllers\ApprovalRetailerController::class,'getCity'])->name('getCity');

Route::post('admin/approveretailer/retailerbank',[App\Http\Controllers\ApprovalRetailerController::class,'updatebank'])->name('retailerbank');


##################################################################
###############                           ########################
############### Admin Approval Product Route      ###############
###############                           ########################
##################################################################

Route::get('admin/approveproduct/ApprovalProductshow', [App\Http\Controllers\ApprovalProductController::class,'index'])->name('ApprovalProductshow');
Route::get('admin/approveproduct/AllApprovalProductshow', [App\Http\Controllers\ApprovalProductController::class,'create'])->name('AllApprovalProductshow');

Route::get('retailer/product/productverify/edit/{id}',[App\Http\Controllers\ApprovalProductController::class,'edit'])->name('productverifyedit');



##################################################################
###############                           ########################
############### Admin View Order Route    ########################
###############                           ########################
##################################################################

Route::get('admin/vieworder/ordershow', [App\Http\Controllers\UserorderController::class,'index'])->name('ordershow');


Route::get('admin/vieworder/orderapprovel/edit/{id}',[App\Http\Controllers\UserorderController::class,'edit'])->name('orderapp');



##################################################################
###############                           ########################
############### Retailer Change apssword Route ###################
###############                           ########################
##################################################################


Route::get('admin/adminchangepassword', [App\Http\Controllers\AdminChangePasswordController::class,'index'])->name('adminchangepass');
Route::post('admin/adminchangepassword', [App\Http\Controllers\AdminChangePasswordController::class,'store'])->name('adminchangestore');



##################################################################
###############                           ########################
############### Retail Login Page Route      ########################
###############                           ########################
##################################################################


Route::get('retailer/retailerlogin',[App\Http\Controllers\RetailerController::class,'create'])->name('retailerlogin');
Route::get('/rhome', [App\Http\Controllers\RetailerHomeController::class,'index'])->name('rhome');




##################################################################
###############                           ########################
############### Retailer Product Add  Route      #################
###############                           ########################
##################################################################

Route::get('retailer/products', [App\Http\Controllers\ProductController::class,'create'])->name('productcreate');
Route::post('retailer/products', [App\Http\Controllers\ProductController::class,'store'])->name('productstore');
Route::get('retailer/products/AllProductshow', [App\Http\Controllers\ProductController::class,'index'])->name('AllProductshow');


Route::post('getsalecity',[App\Http\Controllers\ProductController::class,'getSaleCity'])->name('getSaleCity');
Route::post('getcategory',[App\Http\Controllers\ProductController::class,'getCategory'])->name('getCategory');


Route::delete('retailer/products/destroy/{id}',[App\Http\Controllers\ProductController::class,'destroy'])->name('retailerproductdestroy');

Route::get('retailer/products/edit/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('retailerproductedit');

Route::post('retailer/products/update/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('retailerproductupdate');
Route::post('retailer/products/retailerproductatt',[App\Http\Controllers\ProductController::class,'updateatt'])->name('retailerproductatt');
Route::post('retailer/products/retailerproductimage',[App\Http\Controllers\ProductController::class,'updateimage'])->name('retailerproductimage');

Route::get('retailer/products/show/{id}',[App\Http\Controllers\ProductController::class,'show'])->name('retailerproductshow');



##################################################################
###############                           ########################
############### Retailer Change password Route ###################
###############                           ########################
##################################################################


Route::get('retailer/changepassword', [App\Http\Controllers\ChangePasswordController::class,'index'])->name('retailerchangepass');
Route::post('retailer/changepassword', [App\Http\Controllers\ChangePasswordController::class,'store'])->name('retailerchangestore');


Route::get('retailer/profile', [App\Http\Controllers\RetailerProfileController::class,'index'])->name('changeprofile');
Route::post('retailer/profile', [App\Http\Controllers\RetailerProfileController::class,'store'])->name('changeprofilestore');





##################################################################
###############                           ########################
############### Retailer View Order Route    ########################
###############                           ########################
##################################################################

Route::get('retailer/vieworder/retailerordershow', [App\Http\Controllers\RetailerViewOrder::class,'index'])->name('retailerordershow');


Route::get('retailer/vieworder/orderapprovel/edit/{id}',[App\Http\Controllers\RetailerViewOrder::class,'edit'])->name('orderapp');




##################################################################
###############                           ########################
############### User Home Page Route      ########################
###############                           ########################
##################################################################

Route::get('/', [App\Http\Controllers\UserHomeController::class, 'index'])->name('userhome');


##################################################################
###############                           ########################
############### User Show Men Product Page Route      ################
###############                           ########################
##################################################################


Route::get('user/showproducts/{id}', [App\Http\Controllers\ShowProductController::class,'show'])->name('showproducts');
Route::get('user/showproducts/detail/{id}',[App\Http\Controllers\ShowProductController::class,'edit'])->name('showdetails');



##################################################################
###############                           ########################
############### User Show Women Product Page Route      ################
###############                           ########################
##################################################################


Route::get('user/showwomenproducts/{id}', [App\Http\Controllers\ShowWomenProductController::class,'show'])->name('showwomenproducts');
Route::get('user/showwomenproducts/detail/{id}',[App\Http\Controllers\ShowWomenProductController::class,'edit'])->name('showwomendetails');


##################################################################
###############                           ########################
############### User Register Page Route  ########################
###############                           ########################
##################################################################

Route::get('user/userregister', [App\Http\Controllers\UserRegisterController::class,'create'])->name('registercreate');
Route::post('user/userregister', [App\Http\Controllers\UserRegisterController::class,'store'])->name('registerstore');



##################################################################
###############                           ########################
############### user Login Page Route      ########################
###############                           ########################
##################################################################


Route::get('user/userlogin',[App\Http\Controllers\UserRegisterController::class,'index'])->name('userlogin');
Route::get('/userhome', [App\Http\Controllers\UserRegisterController::class,'index'])->name('rhome');
