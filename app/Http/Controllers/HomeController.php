<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Retailer;
use App\Models\Product;
use App\Models\UserRegister;
use App\Models\UsersOrder;
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
        $category=DB::table('categories')->count();
        $product=DB::table('products')->count();
        $retailer=DB::table('retailers')->count();
        $register=DB::table('user_registers')->count();
        $order=DB::table('users_orders')->count();
        $u_order = UsersOrder::orderBy('id', 'DESC')->take(5)->get();
        return view('home',compact('category','product','retailer','order','register','u_order'));
       // return view('home');
    }
}
