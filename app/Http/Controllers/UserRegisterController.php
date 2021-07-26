<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\UserRegister;
use Auth;
use DB;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        $this->User = new User();
    }

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

        return view('user/userlogin.index',compact('submen','subwomen','subkids'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('user/userregister.create',compact('submen','subwomen','subkids'));
       
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
            'mobile_number'=>'required',
            'address'=>'required',
            'email'=>'required',
            'password'=>'required'


        ]);
       DB::beginTransaction();
       try{

          

         $userregister = new UserRegister();
         $userregister->first_name = $request->first_name;
         $userregister->last_name = $request->last_name;
         $userregister->mobile_number = $request->mobile_number;
         $userregister->address = $request->address;
         $userregister->email = $request->email;
         $userregister->password = $request->password;
         $status="0";
         $userregister->status = $status;


         $userregister->save();


          $type="User";
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

     
         
       
        if($userregister && $User)
         {
             DB::commit();
         }
         else
         {
             DB::rollback();
         }
        // return redirect()->back()->with('Done','User Information  Added');
          return redirect('user/userlogin')->with('Done1','User Information  Added');
           
      
    
     }
     catch(Exception $ex)
     {
         DB::rollback();
         return redirect()->back()->with('Error','User Error');

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

    public function confirmaddress(Request $request){
        $id = Auth::id();
        if(isset($id) && $id!=null){
            $user=DB::table('users')
            ->select('users.email','users.id','user_registers.*')
            ->join('user_registers','user_registers.email','=','users.email')
            ->where('users.id',$id)->first();
            $menstype="Mens";
            $womenstype="Womens";
            $kidsstype="Kids";
            $submen = Subcategory::where('type', $menstype)
            ->get();
            $subwomen = Subcategory::where('type', $womenstype)
            ->get();
            $subkids = Subcategory::where('type', $kidsstype)
            ->get();
            $cart = $request->session()->get('cartdetail');
            if(isset($cart))
                return view('user.orders.confirmaddress',compact('user','submen','subwomen','subkids'));            
            else
                return view('/',compact('submen','subwomen','subkids'));            

        }
        else{
           return redirect('user/userlogin')->with('Done','Please login First to Checkout');
        }
    }
}
