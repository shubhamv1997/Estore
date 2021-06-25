<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Retailer;
use App\Models\City;
use Auth;
use DB;
use App\Models\User;
use App\Models\Bank;

use Illuminate\Support\Facades\Hash;

class ApprovalRetailerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->User = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin/city.index',compact('Cities','countries'));
        return view('admin/approveretailer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view('admin/approveretailer.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'business_name'=>'required',
            'business_address'=>'required',
            'mobile_number'=>'required',
            'business_phone'=>'required',
            'document_name'=>'required',
            'front_pic' =>'required|image|max:2048',
            'back_pic' =>'required|image|max:2048',
            'business_country'=>'required',
            'business_city'=>'required',
            'firstly_charges'=>'required',
            'discount'=>'required',
            'discount_amount'=>'required',
            'monthly_charges'=>'required',
            'bank_name'=>'required',
            'account_number'=>'required',
            'ifsc'=>'required'


        ]);
    
        $id = Auth::id();
        $front_pic = $request->file('front_pic');
        $back_pic = $request->file('back_pic');
        $new_name1 = rand(). "." . $front_pic->getClientOriginalExtension();
        $front_pic->move(public_path('retailerpics'), $new_name1);
        
        $new_name2 = rand(). "." . $back_pic->getClientOriginalExtension();
        $back_pic->move(public_path('retailerpics'), $new_name2);

      //  $data->id = $retailer->id;
        //$photos = $request->file('photo');
        //$password='default';
       //die();
         DB::beginTransaction();
         try{

           $retailer = new Retailer();
           $retailer->user_id = $id;
           $retailer->first_name = $request->first_name;
           $retailer->last_name = $request->last_name;
           $retailer->email = $request->email;
           $retailer->password = $request->password;
           $retailer->business_name = $request->business_name;
           $retailer->business_address = $request->business_address;
           $retailer->mobile_number =$request->mobile_number;
           $retailer->business_phone = $request->business_phone;
           $retailer->document_name = $request->document_name;
           $retailer->front_pic = $new_name1;
           $retailer->back_pic =$new_name2;
           
           $retailer->business_country = $request->business_country;
           $retailer->business_city = $request->business_city;
           $retailer->firstly_charges = $request->firstly_charges;
           $retailer->discount = $request->discount;
           $retailer->discount_amount = $request->discount_amount;
          //$after_discount = $request->discount/$product->original_price) * 100;
           //echo (int)(($request->firstly_charges * $request->discount_amount )/ 100);
           
           $discounted_price = (int)($request->firstly_charges) - (int)(($request->firstly_charges * $request->discount_amount )/ 100);
          //$discounted_price="300";
           $retailer->after_discount = $discounted_price;
           $retailer->monthly_charges = $request->monthly_charges;
           $approval="unapproval";
           $block="block";
           $retailer->approval = $approval;
           $retailer->block=$block;

           $retailer->save();

           $bank = new Bank();
           $bank->user_id = $id;
           $bank->bank_name = $request->bank_name;
           $bank->account_number = $request->account_number;
           $bank->ifsc = $request->ifsc;
           $bank->save();

            $type="Retailer";
            $name=$request->get('first_name').' '.$request->get('last_name');
         
            $emailv="NULL";
            $remember_token="NULL";

           $User= $this->User->create([
           
           'name'=>$name,
           'email'=>$request->get('email'),
           'type'=>$type,
           'email_verified'=>$emailv,
           'password'=>Hash::make($request->get('password')),
           'remember_token'=>$remember_token
       ]);

           
         
          if($retailer && $User && $bank)
           {
               DB::commit();
           }
           else
           {
               DB::rollback();
           }
            return redirect()->back()->with('Done','Retailer Information  Added');
       
        
      
       }
       catch(Exception $ex)
       {
           DB::rollback();
           return redirect()->back()->with('Error','Retailer Error');

       }
      
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

    public function getCity(Request $request)
    {

            $business_country= $request->post('business_country');
        
            $city=City::where('country_id',$business_country)->get();
         
            return response()->json($city);
           
    }

}
