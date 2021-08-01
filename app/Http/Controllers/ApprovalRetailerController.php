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

        $Retailers=DB::table('retailers')
        ->select('retailers.*','countries.country_name','cities.city_name')
        ->join('countries','countries.id','=','retailers.business_country')
        ->join('cities','cities.id','=','retailers.business_city')
        ->get();


        return view('admin/approveretailer.index',compact('Retailers'));

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
        $this->validate($request, [
            'first_name'=>'required|max:50|unique:retailers,first_name', 
            'last_name'=>'required|max:50|unique:retailers,last_name', 
            'email'=>'required|max:50|unique:retailers,email', 
            'password'=>'required', 
            'profile_pic'=>'required|max:2048', 
            'business_name'=>'required|max:100|unique:retailers,business_name', 
            'business_address'=>'required|max:200|unique:retailers,business_address', 
            'mobile_number'=>'required|max:100|unique:retailers,mobile_number', 
            'business_phone'=>'required|max:50|unique:retailers,business_phone', 
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
            'account_number'=>'required|max:100|unique:banks,account_number',
            'ifsc'=>'required',

        ]);
        
    
        $id = Auth::id();
        $front_pic = $request->file('front_pic');
        $back_pic = $request->file('back_pic');
        $profile_pic = $request->file('profile_pic');
        $new_name1 = rand(). "." . $front_pic->getClientOriginalExtension();
        $front_pic->move(public_path('retailerpics'), $new_name1);
        
        $new_name2 = rand(). "." . $back_pic->getClientOriginalExtension();
        $back_pic->move(public_path('retailerpics'), $new_name2);


        $profile_pic2 = rand(). "." . $profile_pic->getClientOriginalExtension();
        $profile_pic->move(public_path('retailerpics'), $profile_pic2);

      //  $data->id = $retailer->id;
        //$photos = $request->file('photo');
        //$password='default';
       //die();
         DB::beginTransaction();
         try{

            
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


           $retailer = new Retailer();
           //$retailer->user_id = $id;
           
           $retailer ->user_id = $User->id;
           $retailer->first_name = $request->first_name;
           $retailer->last_name = $request->last_name;
           $retailer->email = $request->email;
           $retailer->password = $request->password;
           $retailer->profile_pic = $profile_pic2;
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
           $retailer->discount = $request->discount;  /**Radio button value store here */

           $retailer->discount_amount = $request->discount_amount; /* how many discount */
           
           $discounted_price = (int)($request->firstly_charges) - (int)(($request->firstly_charges * $request->discount_amount )/ 100);
          /*discount calculation here */

           $retailer->after_discount = $discounted_price; /*after calculation amount */
           


           $retailer->monthly_charges = $request->monthly_charges;
           $approval="approval";
           $block="unblock";
           $retailer->approval = $approval;
           $retailer->block=$block;

           $retailer->save();


            

       
       $bank = new Bank();
       $bank ->user_id = $User->id;
       //$bank->user_id = $id;
       $bank->bank_name = $request->bank_name;
       $bank->account_number = $request->account_number;
       $bank->ifsc = $request->ifsc;
       $bank->save();

           
         
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
        $countries=Country::all();
        $idd = Auth::id();
        $countries=Country::all();
        $users=DB::table('users')
        ->select('users.*')->where('id',$idd)
        ->get();
 
       


        $retailers = Retailer::find($id);
        $banks = DB::table('banks')
                ->where('user_id', '=', $id)
                ->get();

        return view('admin/approveretailer.edit',compact('retailers','banks','countries','users'));

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
        echo $id;
       // die;
        /*$request->validate([
            'first_name'=>'required',
            'last_name'=>'required',

            'business_name'=>'required',
            'business_address'=>'required',
            'mobile_number'=>'required',
            'business_phone'=>'required',
            'document_name'=>'required',
            'front_pic'=>'required|max:2048',
            'back_pic'=>'required|max:2048',
            'business_country'=>'required',
            'business_city'=>'required',
            'firstly_charges'=>'required',
            'discount'=>'required',
            'monthly_charges'=>'required'
            ]);
            */
            //$id = Auth::id();
        $front_pic = $request->file('front_pic');
        $back_pic = $request->file('back_pic');
        $new_name1 = rand(). "." . $front_pic->getClientOriginalExtension();
        $front_pic->move(public_path('retailerpics'), $new_name1);
        
        $new_name2 = rand(). "." . $back_pic->getClientOriginalExtension();
        $back_pic->move(public_path('retailerpics'), $new_name2);

        

        $retailers = Retailer::find($id);
        $retailers->first_name=$request->get('first_name');
        $retailers->last_name=$request->get('last_name');
        $retailers->business_name=$request->get('business_name');
        $retailers->business_address=$request->get('business_address');
        $retailers->mobile_number=$request->get('mobile_number');
        $retailers->business_phone=$request->get('business_phone');
        $retailers->document_name=$request->get('document_name');
        $retailers->business_country=$request->get('business_country');
        $retailers->firstly_charges=$request->get('firstly_charges');
        $retailers->discount=$request->get('discount');
        $retailers->front_pic=$new_name1;
        $retailers->back_pic=$new_name2;
        $retailers->monthly_charges=$request->get('monthly_charges');


        $retailers->save();

       


        return redirect()->back()->with('Done','Retailer Updated Successfully');
    
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


    public function updatebank(Request $request)
    {

             $retailer_id= $request->post('retailer_id');
             $bankDetails=[
                 'bank_name'=>$request->post('bank_name'),
                 'account_number'=>$request->post('account_number'),
                 'ifsc'=>$request->post('ifsc')


             ];
            $retailer_bank = Bank::where('user_id', $retailer_id)
            ->update($bankDetails);


        return redirect()->back()->with('Done','Bank Information Updated Successfully');
    
           
    }

}
