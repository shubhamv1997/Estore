<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Retailer;
use App\Models\Product;
use App\Models\UserRegister;
use App\Models\UsersOrder;
use DB;

class RetailerHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $category=DB::table('categories')->count();
        $subcategory=DB::table('subcategories')->count();
        $product=DB::table('products')->count();
        $retailer=DB::table('retailers')->count();
        $country=DB::table('countries')->count();
        $city=DB::table('cities')->count();
        $register=DB::table('user_registers')->count();
        $order=DB::table('users_orders')->where('users_orders.retailer_id', $id)
        ->count();
        
        return view('rhome',compact('category','country','city','subcategory','product','retailer','order','register'));
       // return view('home');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
