<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Auth;
use DB;
use App\Models\User;

class RetailerProfileController extends Controller
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
         $id = Auth::id();
     
  $users = DB::table('users')->select('email')->where('id', $id)->get();

 //echo var_dump($users);
        foreach ($users as $u) {
            $uemail=$u->email;
            }

        $retailers=DB::table('retailers')
        ->select('retailers.*')->where('email',$uemail)
        ->get();

        $countries=Country::all();
        return view('retailer/profile.changeprofile',compact('retailers','countries'));
   
        //return view('retailer/profile.changeprofile');
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',

            'business_name'=>'required',
            'business_address'=>'required',
            'mobile_number'=>'required',
            'business_phone'=>'required'


        ]);

        $id = Auth::id();
     
        $users = DB::table('users')->select('email')->where('id', $id)->get();
      
              foreach ($users as $u) {
                  $uemail=$u->email;
                  }
      
             $retailerDetailes = [
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'business_name' => $request->get('business_name'),
                    'business_address' => $request->get('business_address'),
                    'mobile_number' => $request->get('mobile_number'),
                    'business_phone' => $request->get('business_phone')
                ];

              $retailers = DB::table('retailers')
              ->where('email', $uemail)
              ->update($retailerDetailes);

        return redirect()->back()->with('Success','Retailer Profile Updated Successfully');

    
      
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
