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



##################################################################
###############                           ########################
############### User Home Page Route      ########################
###############                           ########################
##################################################################

Route::get('/', [App\Http\Controllers\UserHomeController::class, 'index'])->name('userhome');