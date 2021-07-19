<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Auth;
use DB;
use App\Models\User;

class ShowProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $menstype="Mens";
        $womenstype="Womens";
        $kidsstype="Kids";
        $submen = Subcategory::where('type', $menstype)
        ->get();
        $subwomen = Subcategory::where('type', $womenstype)
        ->get();
        $subkids = Subcategory::where('type', $kidsstype)
        ->get();



       // $product=Product::all();

       $product=DB::table('products')
        ->select('products.*','countries.country_name','cities.city_name','categories.category_name','subcategories.subcategory_name','users.name','product_images.image_1','product_images.image_2','product_images.image_3','product_attributes.att_name1','product_attributes.att_value1','product_attributes.att_name2','product_attributes.att_value2')
        ->join('countries','countries.id','=','products.country_id')
        ->join('cities','cities.id','=','products.city_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('users','users.id','=','products.retailer_id')
        ->join('product_images','product_images.product_id','=','products.id')
        ->join('product_attributes','product_attributes.product_id','=','products.id')
        ->where('subcategory_id',$id)
        ->orderBy('id', 'DESC')->get();
        

       // $product=Product::where('subcategory_id',$id)->get();
        return view('user/showproduct.index',compact('product','submen','subwomen','subkids'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo $id;

        $menstype="Mens";
        $womenstype="Womens";
        $kidsstype="Kids";
        $submen = Subcategory::where('type', $menstype)
        ->get();
        $subwomen = Subcategory::where('type', $womenstype)
        ->get();
        $subkids = Subcategory::where('type', $kidsstype)
        ->get();



       // $product=Product::all();

       $product=DB::table('products')
        ->select('products.*')->where('id',$id)
        ->get();

        
       $product1=DB::table('product_images')
       ->select('product_images.*')->where('product_id',$id)
       ->get();

       
       $product2=DB::table('product_attributes')
       ->select('product_attributes.*')->where('product_id',$id)
       ->get();
        

       // $product=Product::where('subcategory_id',$id)->get();
        return view('user/showproduct.detail',compact('product','product1','product2','submen','subwomen','subkids'));
       

       
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
