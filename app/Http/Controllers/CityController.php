<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use Auth;

class CityController extends Controller
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
        $Cities = City::all();
        $countries=Country::all();
        return view('admin/city.index',compact('Cities','countries'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view('admin/city.create',compact('countries'));

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
            'country_id'=>'required', 
            'city_name'=>'required|max:50|unique:cities,city_name', 
            
        ]);
         $id = Auth::id();
        
        $form_data = array(
            
            'user_id'=>(string)$id,
            'country_id' => $request->country_id,
            'city_name' => $request->city_name


        );

        City::create($form_data);

       return redirect()->back()->with('Done','City Added Successfully');

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
        $cities = City::find($id);
        $countries = Country::all();
        return view('admin/city.edit',compact('cities','countries'));
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
        $request->validate([
            'country_id'=>'required',
            'city_name'=>'required'
            ]);
            //$id = Auth::id();

        $cities = City::find($id);
        $cities->country_id=$request->get('country_id');
        $cities->city_name=$request->get('city_name');


        $cities->save();
        return redirect('admin/city/cityshow')->with('Done','City Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::findOrFail($id);
        $cities->delete();
        return redirect()->back()->with('Done','Data Deleted');
    }
}
