<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Retailer;
use App\Models\Product;
use App\Models\UserRegister;
use App\Models\UsersOrder;
use App\Models\Country;
use App\Models\City;
use App\Models\OrderDetail;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order=DB::table('order_details')->count();
        
        $category=DB::table('categories')->count();
        $subcategory=DB::table('subcategories')->count();
        $product=DB::table('products')->count();
        $retailer=DB::table('retailers')->count();
        $country=DB::table('countries')->count();
        $city=DB::table('cities')->count();
        $register=DB::table('user_registers')->count();
        


        return view('home',compact('category','country','subcategory','city','product','retailer','order','register'));
       // return view('home');
    }
}
