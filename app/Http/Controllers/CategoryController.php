<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

use App\User;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('admin/category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin/category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $request->validate([
         //   'category_name'=>'required',
            
          //  'type' =>'required'


       // ]);

       $this->validate($request, [
        'category_name'=>'required|max:50|unique:categories,category_name', 
        'type'=>'required', 
    ]);

         $id = Auth::id();
        
        $form_data = array(
            
            'user_id'=>(string)$id,
            'category_name' => $request->category_name, 
            'type'  =>$request->type


        );

        Category::create($form_data);

       return redirect()->back()->with('Done','Category Added Successfully');
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
        $categories = Category::find($id);
        return view('admin/category.edit',compact('categories'));
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
                'category_name'=>'required',
                'type'=>'required'
                ]);
                //$id = Auth::id();

            $categories = Category::find($id);
            $categories->category_name=$request->get('category_name');
            $categories->type=$request->get('type');


            $categories->save();
            return redirect('admin/category/catshow')->with('Done','category Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('Done','Data Deleted');
    }
}
