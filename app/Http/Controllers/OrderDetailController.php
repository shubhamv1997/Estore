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
use App\Http\Controllers\Redirect;

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
                $uorders->order_date =  date('Y/m/d');
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
            $product->order_date=date('Y/m/d');
            $product->status="Payment Pending";
            
            $product->province = $request->province;
            $product->country = $request->country;

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
    public function adminorderdetail(Request $request,$id){

       
            $orders = OrderDetail::select()
            ->join('users','users.id','=','order_details.user_id')
            // ->join('products','products.id','=','order_details.user_id')
            ->select('order_details.*','users.name','users.email')
            ->where('order_details.id',$id)
            ->orderby('order_details.id')->first();
            return view('admin.order.adminorderdetail',compact('orders'));

    }
    
    public function reatilerorderdetail(Request $request,$id){

        if(Auth::id()){

            // $orders = UsersOrder::select()
            // ->join('order_details.name','user_orders.user_id','user_orders.product_id','user_orders.retailer_id','user_orders.quantity','user_orders.amount','user_orders.order_date','user_orders.status')
            // ->join('order_details','order_details.id','=','user_oders.order_id')
            // ->join('users','users.id','=','user_orders.retailer_id')
            // ->where('order_details.id',$id)
            // ->first();
            
            $orders = OrderDetail::select()
            ->join('users','users.id','=','order_details.user_id')
            // ->join('products','products.id','=','order_details.user_id')
            ->select('order_details.*','users.name','users.email')
            ->where('order_details.id',$id)
            ->orderby('order_details.id')->first();
            // print_r($orders);die();
            return view('retailer.vieworder.reatilerorderdetail',compact('orders'));

        }else{
            return redirect()->route('userlogin');
        }
    }
    public function saveorderrating(Request $request){

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

            $update=[
                'is_order_reviewed'=>1,
                'user_review'=>$request->user_review,
                'user_star'=>$request->user_star,
                'status'=>'Order Reviewed'

            ];
           $updateorders = OrderDetail::where('id', $request->id)
            ->where('user_id',Auth::id())        
           ->update($update);
           $orders = OrderDetail::select()
           ->where('user_id',Auth::id())
           ->orderby('id','DESC')->get();
           return view('user.orders.myorders',compact('orders','submen','subwomen','subkids'));


        }else{
            return redirect()->route('userlogin');
        }
    }
    
    public function saveshippingdetail(Request $request){

        if(Auth::id()){

            $update=[
                'is_order_shipped'=>1,
                'shipping_company'=>$request->shipping_company,
                'tracking_id'=>$request->tracking_id,
                'link'=>$request->link,
                'status'=>'Order Shipped'
            ];
           $updateorders = OrderDetail::where('id', $request->id)   
           ->update($update);


           return redirect('retailer/vieworder/retailerordershow');


        }else{
            return redirect()->route('userlogin');
        }
    }
    public function markordercomplete(Request $request){

        if(Auth::id()){

            $update=[
                'status'=>'Completed',
            ];
           $updateorders = UsersOrder::where('order_id', $request->id) 
           ->where('retailer_id',Auth::id())  
           ->update($update);


           return redirect('retailer/vieworder/retailerordershow');


        }else{
            return redirect()->route('userlogin');
        }
    }
    public function markordercompletebyadmin(Request $request){

        if(Auth::id()){

            $update=[
                'status'=>'Completed',
                'is_order_complete'=>1
            ];
           $updateorders = OrderDetail::where('id', $request->id)
           ->update($update);


        //    return redirect('retailer/vieworder/retailerordershow');
            // return Redirect::back();
            return back()->withInput();


        }else{
            return redirect()->route('userlogin');
        }
    }
    
}

