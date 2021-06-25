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



Route::post('getcity',[App\Http\Controllers\ApprovalRetailerController::class,'getCity'])->name('getCity');



##################################################################
###############                           ########################
############### Admin Approval Product Route      ###############
###############                           ########################
##################################################################

Route::get('admin/approveproduct/ApprovalProductshow', [App\Http\Controllers\ApprovalProductController::class,'index'])->name('ApprovalProductshow');




##################################################################
###############                           ########################
############### User Home Page Route      ########################
###############                           ########################
##################################################################

Route::get('/', [App\Http\Controllers\UserHomeController::class, 'index'])->name('userhome');