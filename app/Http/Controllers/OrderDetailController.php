<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\OrderDetail;
use App\Models\UsersOrder;
use Auth;
use DB;
use App\Models\User;

class OrderDetailController extends Controller
{
    //
    public function index()
    {
        
    }
    public function saveorderandpay(Request $request)
    {
        DB::beginTransaction();
         try{
            $cartdetail = $request->session()->get('cartdetail');
            $products_details = array();
            $x = array();
            foreach($cartdetail as $id=>$cart){
                $prodinfo = Product::select()->where("id",$id)->first();
                // print_r($prodinfo);
                $productdetail = array(
                    "name"=>$cart['name'],
                    "quantity" => $cart['quantity'],
                    "price" => $cart['price'],
                    "productid"=>$id,
                    "retailerid"=>$prodinfo->retailer_id
                );
                array_push($products_details,$productdetail);
                

                $uorders = new UsersOrder();
                $uorders->user_id = Auth::id();
                $uorders->retailer_id = $prodinfo->retailer_id;
                $uorders->product_id = $id;
                $uorders->Quantity = $cart['quantity'];
                $uorders->amount = $cart['price'];
                $uorders->order_date =  Date('d/m/y');
                $uorders->status = "Pending";
                array_push($x,$uorders);
            }

            // print_r($products_details);
            // die();
            $id = Auth::id();
            $product = new OrderDetail();
            $product->user_id = $id;
            $product->address = $request->address;

            $product->billing_address = $request->billing_address;
            $product->city = $request->city;
            $product->pincode = $request->pincode;
            $product->retailers = '';
            $product->order_date=Date('d/m/y');
            $product->status="Payment Pending";

            $product->local_pickup = $request->local_pickup;
            $product->products_detail  = \json_encode($products_details);

            // print_r(json_encode($products_details));
            // die();
           $product->save();
           $orderid = $product->id;
           $request->session()->put('orderid',$orderid);   
            foreach ($x as $uorders){
                $uorders->order_id =$orderid;
                $uorders->save();
            }
         
               DB::commit();
          
        return redirect()->route('make.payment');
       
        
      
       }
       catch(Exception $ex)
       {
           DB::rollback();
           echo "ggggg";
          // return redirect()->back()->with('Error','Product Error');

       }
        // return view('admin/vieworder.allorder',compact('u_orders','retatiler'));

    }

    public function myorders(Request $request){

        if(Auth::id()){
            $menstype="Mens";
            $womenstype="Womens";
            $kidsstype="Kids";
            $submen = Subcategory::where('type', $menstype)
            ->get();
            $subwomen = Subcategory::where('type', $womenstype)
            ->get();
            $subkids = Subcategory::where('type', $kidsstype)
            ->get();

            $orders = OrderDetail::select()
            ->where('user_id',Auth::id())
            ->orderby('id','DESC')->get();
            return view('user.orders.myorders',compact('orders','submen','subwomen','subkids'));

        }else{
            return redirect()->route('userlogin');
        }
    }
    public function orderdetail(Request $request,$id){

        if(Auth::id()){
            $menstype="Mens";
            $womenstype="Womens";
            $kidsstype="Kids";
            $submen = Subcategory::where('type', $menstype)
            ->get();
            $subwomen = Subcategory::where('type', $womenstype)
            ->get();
            $subkids = Subcategory::where('type', $kidsstype)
            ->get();

            $orders = OrderDetail::select()
            ->join('users','users.id','=','order_details.user_id')
            // ->join('products','products.id','=','order_details.user_id')
            ->select('order_details.*','users.name','users.email')
            ->where('user_id',Auth::id())
            ->where('order_details.id',$id)
            ->orderby('order_details.id')->first();
            return view('user.orders.orderdetail',compact('orders','submen','subwomen','subkids'));

        }else{
            return redirect()->route('userlogin');
        }
    }
}

