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

class ShowProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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



       // $product=Product::all();

       $product=DB::table('products')
        ->select('products.*','countries.country_name','cities.city_name','categories.category_name','subcategories.subcategory_name','users.name','product_images.image_1','product_images.image_2','product_images.image_3','product_attributes.att_name1','product_attributes.att_value1','product_attributes.att_name2','product_attributes.att_value2')
        ->join('countries','countries.id','=','products.country_id')
        ->join('cities','cities.id','=','products.city_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('users','users.id','=','products.retailer_id')
        ->join('product_images','product_images.product_id','=','products.id')
        ->join('product_attributes','product_attributes.product_id','=','products.id')
        ->where('subcategory_id',$id)
        ->orderBy('id', 'DESC')->get();
        

       // $product=Product::where('subcategory_id',$id)->get();
        return view('user/showproduct.index',compact('product','submen','subwomen','subkids'));
       
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

        $menstype="Mens";
        $womenstype="Womens";
        $kidsstype="Kids";
        $submen = Subcategory::where('type', $menstype)
        ->get();
        $subwomen = Subcategory::where('type', $womenstype)
        ->get();
        $subkids = Subcategory::where('type', $kidsstype)
        ->get();



       // $product=Product::all();

       $product=DB::table('products')
        ->select('products.*')->where('id',$id)
        ->get();

        
       $product1=DB::table('product_images')
       ->select('product_images.*')->where('product_id',$id)
       ->get();

       
       $product2=DB::table('product_attributes')
       ->select('product_attributes.*')->where('product_id',$id)
       ->get();
        

       // $product=Product::where('subcategory_id',$id)->get();
        return view('user/showproduct.detail',compact('product','product1','product2','submen','subwomen','subkids'));
       

       
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

    public function cart2(Request $request)

    {
        // echo "Hello";
        $menstype="Mens";
        $womenstype="Womens";
        $kidsstype="Kids";
        $submen = Subcategory::where('type', $menstype)
        ->get();
        $subwomen = Subcategory::where('type', $womenstype)
        ->get();
        $subkids = Subcategory::where('type', $kidsstype)
        ->get();
        // print_r($request->session()->get('cartdetail'));
       // return view('user/showproduct/cart');
       $product=DB::table('products')
        ->select('products.*','countries.country_name','cities.city_name','categories.category_name','subcategories.subcategory_name','users.name','product_images.image_1','product_images.image_2','product_images.image_3','product_attributes.att_name1','product_attributes.att_value1','product_attributes.att_name2','product_attributes.att_value2')
        ->join('countries','countries.id','=','products.country_id')
        ->join('cities','cities.id','=','products.city_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('users','users.id','=','products.retailer_id')
        ->join('product_images','product_images.product_id','=','products.id')
        ->join('product_attributes','product_attributes.product_id','=','products.id')
        ->limit(12)
        ->orderBy('id', 'DESC')->get();
        

       // $product=Product::where('subcategory_id',$id)->get();
        // return view('user/showproduct.index',compact('product','submen','subwomen','subkids'));
       
        return view('user/showproduct/cart',compact('product','submen','subwomen','subkids'));
       


    }
    public function updateCart(Request $request){
        // print_r($request); die();
        if($request->id){

            $cart = session()->get('cartdetail');

            $cart[$request->id]["quantity"] = $request->qty;

            session()->put('cartdetail', $cart);

        }
        return redirect()->back()->with('success', 'Cart updated Successfully!');
    }
    public function remove($id,Request $request)

    {
        // echo "Hello";
        $menstype="Mens";
        $womenstype="Womens";
        $kidsstype="Kids";
        $submen = Subcategory::where('type', $menstype)
        ->get();
        $subwomen = Subcategory::where('type', $womenstype)
        ->get();
        $subkids = Subcategory::where('type', $kidsstype)
        ->get();
        $cartdetail = $request->session()->get('cartdetail');
        // $cartdetail = $request->session()->get('cart');
        // print_r($value);
        // die();
        if(isset($cartdetail[$id])) {
            // SESSION::forget($cartdetail[$id]);
            // echo $cartdetail[$id];
            unset($cartdetail[$id]);
        $request->session()->put('cartdetail', $cartdetail);
            
        }
        $product=DB::table('products')
        ->select('products.*','countries.country_name','cities.city_name','categories.category_name','subcategories.subcategory_name','users.name','product_images.image_1','product_images.image_2','product_images.image_3','product_attributes.att_name1','product_attributes.att_value1','product_attributes.att_name2','product_attributes.att_value2')
        ->join('countries','countries.id','=','products.country_id')
        ->join('cities','cities.id','=','products.city_id')
        ->join('categories','categories.id','=','products.category_id')
        ->join('subcategories','subcategories.id','=','products.subcategory_id')
        ->join('users','users.id','=','products.retailer_id')
        ->join('product_images','product_images.product_id','=','products.id')
        ->join('product_attributes','product_attributes.product_id','=','products.id')
        ->where('subcategory_id',$id)
        ->orderBy('id', 'DESC')->get();
        // print_r($request->session()->get('cartdetail'));
        // die();
       // return view('user/showproduct/cart');
        return view('user/showproduct/cart',compact('product','submen','subwomen','subkids'));
       


    }
    public function addToCart(Request $request, $id)

    {

        $product = Product::findOrFail($id);

          
        // session()->put('cart',[]); die();
        // $cart = session()->get('cart');
        // print_r($request->session()->get('cart'));
        // // print_r($cart);
        // $request->session()->flush();
        // // unset($cart);
        // die();
        $cartdetail = $request->session()->get('cartdetail');
        // print_r($cartdetail);
        if(isset($cartdetail[$id])) {
            echo "if";
            $cartdetail[$id]['quantity'] = $cartdetail[$id]['quantity']+1;

        } else {
            echo "else";
            $cartdetail[$id] = [

                "name" => $product->product_name,

                "quantity" => 1,

                "price" => $product->amount,

                "image" => $product->pics


            ];

        }

          

        $request->session()->put('cartdetail', $cartdetail);
        // print_r(session()->get('cartdetail'));
        // die();
        return redirect()->back()->with('success', 'Product added to cartdetail successfully!');

    }

  

    

   
}
