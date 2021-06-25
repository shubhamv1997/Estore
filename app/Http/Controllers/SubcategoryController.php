<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Auth;
class SubcategoryController extends Controller
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
        $subcategories = Subcategory::all();
        $category=Category::all();
       // return view('admin/subcat.index')->with('subcategories', $subcategories);
        return view('admin/subcat.index',compact('category','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin/subcat.create',compact('categories'));

        //return view('admin/subcat.create');
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
            'type'=>'required',
            'category_id'=>'required',
            'subcategory_name'=>'required'


        ]);
         $id = Auth::id();
        
        $form_data = array(
            
            'user_id'=>(string)$id,
            'type' => $request->type,
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name


        );

        Subcategory::create($form_data);

       return redirect()->back()->with('Done','Subcategory Added Successfully');

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
        $subcategories = Subcategory::find($id);
        $categories = Category::all();
        return view('admin/subcat.edit',compact('subcategories','categories'));
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
            'type'=>'required',
            'category_id'=>'required',
            'subcategory_name'=>'required'
            ]);
            //$id = Auth::id();

        $subcategories = Subcategory::find($id);
        
        $subcategories->type=$request->get('type');
        $subcategories->category_id=$request->get('category_id');
        $subcategories->subcategory_name=$request->get('subcategory_name');


        $subcategories->save();
        return redirect('admin/subcat/subshow')->with('Success','Subcategory Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->back()->with('Success','Data Deleted');
    }

    public function getType(Request $request)
    {

            $type= $request->post('type');
        
            $category=Category::where('type',$type)->get();
         
            return response()->json($category);
           
    }

}
