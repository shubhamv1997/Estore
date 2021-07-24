<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Auth;
use DB;
use App\Models\User;


class ProductController extends Controller
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
        $status='unapproval';
        $user_email=auth()->user()->email;
       
        
        $products=DB::table('products')
        ->select('products.*','countries.country_name','cities.city_name','categories.category_name','subcategories.subcategory_name','users.name','product_images.image_1','product_images.image_2','product_images.image_3','product_attributes.att_name1','product_attributes.att_value1','product_attributes.att_name2','product_attributes.att_value2')
        ->join('countries','countries.id','=','products.country_id')
        ->join('cities','cities.id','=','products.city_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('users','users.id','=','products.retailer_id')
        ->join('product_images','product_images.product_id','=','products.id')
        ->join('product_attributes','product_attributes.product_id','=','products.id')
        ->where('status', $status)
        ->where('users.email',$user_email)
        ->orderBy('id', 'DESC')->get();
         return view('retailer/products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        
        $countries=Country::all();
        $categories=Category::all();
        $users=DB::table('users')
        ->select('users.*')->where('id',$id)
        ->get();
 
        return view('retailer/products.create',compact('countries','categories','users'));
       // return view('retailer/products.create');
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
            'product_name'=>'required|max:50|unique:products,product_name', 
            'amount'=>'required', 
            'final_amount'=>'required', 
            'description'=>'required|max:500|unique:products,description', 
            'category_id'=>'required', 
            'subcategory_id'=>'required', 
            'retailer_id'=>'required', 
            'country_id'=>'required', 
            'city_id'=>'required', 
            'tax'=>'required', 
            'return_policy'=>'required', 
            'specification'=>'required|max:500', 
            'image_1'=>'required|image|max:2048|unique:product_images,image_1', 
            'image_2'=>'required|image|max:2048|unique:product_images,image_2', 
            'image_3'=>'required|image|max:2048|unique:product_images,image_3', 
            'att_name1'=>'required', 
            'att_value1'=>'required', 
            'att_name2'=>'required', 
            'att_value2'=>'required', 
        ]);

        
        $id = Auth::id();
        $image_1 = $request->file('image_1');
        $image_2 = $request->file('image_2');
        $image_3 = $request->file('image_3');
        $new_name1 = rand(). "." . $image_1->getClientOriginalExtension();
        $image_1->move(public_path('productpics'), $new_name1);
        
        $new_name2 = rand(). "." . $image_2->getClientOriginalExtension();
        $image_2->move(public_path('productpics'), $new_name2);

        $new_name3 = rand(). "." . $image_3->getClientOriginalExtension();
        $image_3->move(public_path('productpics'), $new_name3);

      //  $data->id = $retailer->id;
        //$photos = $request->file('photo');
        //$password='default';
       //die();
         DB::beginTransaction();
         try{

            

           $product = new Product();
           $product->user_id = $id;
           $product->product_name = $request->product_name;

           $retailer_amount=$request->amount;
           $final_amount=$request->final_amount;
            $amount_commission=$final_amount-$retailer_amount;

           $product->amount = $retailer_amount;
           $product->final_amount = $final_amount;
           $product->amount_commission = $amount_commission;
           $product->description = $request->description;
           $product->category_id = $request->category_id;
           $product->subcategory_id = $request->subcategory_id;
           $product->retailer_id = $request->retailer_id;
           $product->country_id =$request->country_id;
           $product->city_id = $request->city_id;
           $product->tax = $request->tax;
           $product->return_policy = $request->return_policy;
           $product->specification = $request->specification;
           $unapproval="unapproval";
           $product->status = $unapproval;

           $product->save();

       
            $pimage = new ProductImage();
            $pimage->user_id = $id;
            $pimage ->product_id = $product->id; 
            $pimage->image_1 = $new_name1;
            $pimage->image_2 =$new_name2;
            $pimage->image_3 =$new_name3;
            $pimage->save();

            
            $pattribute = new ProductAttribute();
            $pattribute->user_id = $id;
            $pattribute ->product_id = $product->id;
            
           $pattribute->att_name1 = $request->att_name1;
           $pattribute->att_value1 = $request->att_value1;
           $pattribute->att_name2 = $request->att_name2;
           $pattribute->att_value2 = $request->att_value2;
            $pattribute->save();

            
         
          if($product && $pimage && $pattribute)
           {
               DB::commit();
           }
           else
           {
               DB::rollback();
           }
            return redirect()->back()->with('Done','Product Information  Added');
       
        
      
       }
       catch(Exception $ex)
       {
           DB::rollback();
           echo "ggggg";
          // return redirect()->back()->with('Error','Product Error');

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
       // echo $id;
       
        $products=DB::table('products')
        ->select('products.*','countries.country_name','cities.city_name','categories.category_name','subcategories.subcategory_name','users.name','product_images.image_1','product_images.image_2','product_images.image_3','product_attributes.att_name1','product_attributes.att_value1','product_attributes.att_name2','product_attributes.att_value2')
        ->join('countries','countries.id','=','products.country_id')
        ->join('cities','cities.id','=','products.city_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('users','users.id','=','products.retailer_id')
        ->join('product_images','product_images.product_id','=','products.id')
        ->join('product_attributes','product_attributes.product_id','=','products.id')
        ->where('products.id', $id)
         ->get();
         // echo $products;
        return view('retailer/products.show',compact('products'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo $id;

        $idd = Auth::id();
        $countries=Country::all();
        $categories=Category::all();
        $users=DB::table('users')
        ->select('users.*')->where('id',$idd)
        ->get();
 
       


        $products = Product::find($id);
        //$product_attributes = ProductAttribute::find($id);
        $product_attributes = DB::table('product_attributes')
                ->where('product_id', '=', $id)
                ->get();

        $product_images = DB::table('product_images')
                ->where('product_id', '=', $id)
                ->get();
       // print_r($product_attributes);
        //die;
        return view('retailer/products.edit',compact('products','product_images','product_attributes','countries','categories','users'));
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
            'product_name'=>'required',
            'amount'=>'required',
            'final_amount'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'retailer_id'=>'required',
            'country_id'=>'required',
            'city_id'=>'required',
            'tax'=>'required',
            'return_policy'=>'required',
            'specification'=>'required'
            ]);
            //$id = Auth::id();

        $products = Product::find($id);
        $products->product_name=$request->get('product_name');
        $products->amount=$request->get('amount');
        $products->final_amount=$request->get('final_amount');
        $products->description=$request->get('description');
        $products->category_id=$request->get('category_id');
        $products->subcategory_id=$request->get('subcategory_id');
        $products->retailer_id=$request->get('retailer_id');
        $products->country_id=$request->get('country_id');
        $products->city_id=$request->get('city_id');
        $products->tax=$request->get('tax');
        $products->return_policy=$request->get('return_policy');
        $products->specification=$request->get('specification');


        $products->save();

        


        return redirect()->back()->with('Done','Product Updated Successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $product = Product::findOrFail($id);
        


      // DB::table('product_attributes')->where('product_id', $id)->delete();
     //  DB::table('product_images')->where('product_id', $id)->delete();

      //$product->delete();
       // return redirect()->back()->with('Success','Product Data Deleted');
    }

    
    public function getSaleCity(Request $request)
    {

            $sale_country= $request->post('country_id');
        
            $city=City::where('country_id',$sale_country)->get();
         
            return response()->json($city);
           
    }


    public function getCategory(Request $request)
    {

            $category_id= $request->post('category_id');
            
            $subcat=Subcategory::where('category_id',$category_id)->get();
         
            return response()->json($subcat);
           
    }

    
    
    public function updateatt(Request $request)
    {

             $product_id= $request->post('product_id');
             $attDetails=[
                 'att_name1'=>$request->post('att_name1'),
                 'att_value1'=>$request->post('att_value1'),
                 'att_name2'=>$request->post('att_name2'),
                 'att_value2'=>$request->post('att_value2')


             ];
            $product_att = ProductAttribute::where('product_id', $product_id)
            ->update($attDetails);


        return redirect()->back()->with('Done','Products Updated Successfully');
    
           
    }


    public function updateimage(Request $request)
    {

             $product_id= $request->post('product_id');

             $hidden_name1 = $request->hidden_image1;
             $hidden_name2 = $request->hidden_image2;
             $hidden_name3 = $request->hidden_image3;
                
        $image_1 = $request->file('image_1');
        $image_2 = $request->file('image_2');
        $image_3 = $request->file('image_3');
        $new_name1 = rand(). "." . $image_1->getClientOriginalExtension();
        $image_1->move(public_path('productpics'), $new_name1);
        
        $new_name2 = rand(). "." . $image_2->getClientOriginalExtension();
        $image_2->move(public_path('productpics'), $new_name2);

        $new_name3 = rand(). "." . $image_3->getClientOriginalExtension();
        $image_3->move(public_path('productpics'), $new_name3);


             $imgDetails=[
                 'image_1'=>$new_name1,
                 'image_2'=>$new_name2,
                 'image_3'=>$new_name3

             ];
            $product_att = ProductImage::where('product_id', $product_id)
            ->update($imgDetails);


        return redirect()->back()->with('Done','Products Images Updated Successfully');
    
           
    }

}
