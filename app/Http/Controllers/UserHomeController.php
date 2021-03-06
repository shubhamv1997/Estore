<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use DB;
class UserHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        //$suball= Subcategory::all();

        
       $status='Approval By Admin';
        
       $product=DB::table('products')
        ->select('products.*','countries.country_name','cities.city_name','categories.category_name','subcategories.subcategory_name','users.name','product_images.image_1','product_images.image_2','product_images.image_3','product_attributes.att_name1','product_attributes.att_value1','product_attributes.att_name2','product_attributes.att_value2')
        ->join('countries','countries.id','=','products.country_id')
        ->join('cities','cities.id','=','products.city_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('users','users.id','=','products.retailer_id')
        ->join('product_images','product_images.product_id','=','products.id')
        ->join('product_attributes','product_attributes.product_id','=','products.id')
        ->where('products.category_id',2)
         ->where('products.status',$status)
        ->orderBy('id', 'DESC')
        ->limit(4)
        ->get();


        return view('userhome',compact('submen','subwomen','subkids','product'));
       // return view('userhome');
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
