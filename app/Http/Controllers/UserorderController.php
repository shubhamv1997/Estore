<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Retailer;
use Auth;
use DB;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetail;

use App\Models\UsersOrder;

class UserorderController extends Controller
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
        $orders = OrderDetail::select()
        ->orderby('id','DESC')->get();
        return view('admin/vieworder.allorder',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $orders = OrderDetail::select()
        ->where('status','Payment Pending')
        ->orderby('id','DESC')->get();
        return view('admin/vieworder.paymentpendingorder',compact('orders'));

       
        
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
        $u_order = UsersOrder::findOrFail($id);
       
        $u_order->status='Order Approvel By Admin';
          
            //print_r($guest);
        $u_order->save();
        return redirect()->back()->with('Success','Status Updated By Admin');

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


    public function paid()
    {

        $orders = OrderDetail::select()
        ->where('status','Paid')
        ->orderby('id','DESC')->get();
        return view('admin/vieworder.paidorder',compact('orders'));

       
        
    }

    
    public function review()
    {

        $orders = OrderDetail::select()
        ->where('status','Order Reviewed')
        ->orderby('id','DESC')->get();
        return view('admin/vieworder.revieworder',compact('orders'));

       
        
    }


    
    public function complete()
    {

        $orders = OrderDetail::select()
        ->where('is_order_complete','1')
        ->orderby('id','DESC')->get();
        return view('admin/vieworder.completeorder',compact('orders'));

       
        
    }
}
