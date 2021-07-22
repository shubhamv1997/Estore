<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retailer;
use Auth;
use DB;
use App\Models\User;
use App\Models\Product;

use App\Models\UsersOrder;
class RetailerViewOrder extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u_orders=DB::table('users_orders')
        ->select('users_orders.*','users.name','users.email','products.product_name')
        ->join('users','users.id','=','users_orders.user_id')
        ->join('products','products.id','=','users_orders.product_id')
        ->where('users_orders.retailer_id',Auth()->user()->id)
        ->orderBy('id', 'DESC')->get();

       // print_r($u_orders);
        $retatiler = array();
        foreach ($u_orders as $key => $value) {
            $retailer = DB::table('retailers')
            ->select('retailers.*')
            ->join('users','users.id','=','retailers.user_id')
            ->first();       
            array_push($retatiler,$retailer);     
        }
        // dd($retatiler);
        // die();
         return view('retailer/vieworder.retailerallorder',compact('u_orders','retatiler'));

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
