@extends('user.userdashboard')
@section('user')


<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</li>
				<li class="active">Cart</li>

                @guest
                @if (Route::has('register'))
                @endif
                @else
                <p style="float:right">Welcome: <span class="fa fa-user"></span> {{ Auth::user()->name }}</p>
                

                @endguest
			</ol>
		</div>
</div>
<!-- //breadcrumbs -->
<div class="container-fluid">
    <div class="row" style="border:1px solid grey">
        <div class="col-md-1"style="border-left:1px solid grey">
            <strong></strong>
        </div>
        <div class="col-md-1"style="border-left:1px solid grey">
            <strong>Sr.No</strong>
        </div>
        <div class="col-md-2"style="border-left:1px solid grey">
            <strong>Name</strong>
        </div>
        <div class="col-md-2"style="border-left:1px solid grey">
            <strong>Image</strong>
        </div>
        <div class="col-md-1"style="border-left:1px solid grey">
            <strong>Price</strong>
        </div>
        <div class="col-md-1">
            <strong>Quantity</strong>
        </div>
        <div class="col-md-1"style="border-left:1px solid grey">
            <strong></strong>
        </div>
        <div class="col-md-1"style="border-left:1px solid grey">
            <strong>Sub Total</strong>
        </div>
        <div class="col-md-1"style="border-left:1px solid grey">
            <strong>Operation</strong>
        </div>
        <div class="col-md-1"style="border-left:1px solid grey">
            <strong></strong>
        </div>
    </div>
    @php $total = 0 @endphp
    @if(session('cartdetail'))
        @foreach(session('cartdetail') as $id => $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
            <div class="row border border-black" style="border:1px solid grey">
                <div class="col-md-1" style="line-height:100px; border-left:1px solid grey">
                    
                </div>
                <div class="col-md-1" style="line-height:100px; border-left:1px solid grey">
                    {{ $id }}
                </div>
                <div class="col-md-2" style="line-height:100px; border-left:1px solid grey">
                    {{ $details['name'] }}
                </div>
                <div class="col-md-2" style="line-height:100px; border-left:1px solid grey">
                    <img src="{{ URL::to('/')}}/productpics/{{ $details['image']}}"
                    class="img img-responsive" style="height:100px;width:100px"/>
                </div>
                <div class="col-md-1" style="line-height:100px; border-left:1px solid grey">
                    ${{ $details['price'] }}
                </div>
                <form action="{{url('updateCart')}}" method="post">
                    @csrf
                    <div class="col-md-1" style="line-height:10px;"><br/><br/><br/>
                        <input type="number" name="qty"
                        value="{{ $details['quantity'] }}" 
                        class="form-control" />
                        <input type="hidden" name="id" value="{{$id}}"/>
                    </div>
                    <div class="col-md-1" style="line-height:100px; border-left:1px solid grey">
                        <input type="submit"class="btn btn-info btn-sm " value="Update" />
                    </div>
                </form>
                <div class="col-md-1" style="line-height:100px; border-left:1px solid grey">
                    <strong>${{ $details['price'] * $details['quantity'] }}</strong>
                </div>
                <div class="col-md-1" style="line-height:100px; border-left:1px solid grey">
                    <a href="{{ route('removefromcart',$id)}}" class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></a>

                </div>
                
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-md-4 " ><br/>
            <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
        </div>
        <div class="col-md-8 text-right">
            <br/>
            <button class="btn btn-success">Checkout</button>
            <h3><strong>Total ${{ $total }}</strong></h3>   
        </div>
        
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12"><h3 class="text-center text-info"><br/>Product You May like</h3><br/></div>        
        <div class="clearfix"></div>
        
        <div class="col-md-12" style="padding-left:5% !important" >
        @foreach($product as $p)
			
            <div class="col-md-3 top_brand_left-1">
                <div class="hover14 column">
                    <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid_pos">
                            <!-- <img src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}" alt=" " class="img-responsive"> -->
                        </div>
                        <div class="agile_top_brand_left_grid1">
                            <figure>
                                <div class="snipcart-item block">
                                    <div class="snipcart-thumb">
                                        <a href="#"><img class=" img-responsive" style="height:200px"title=" " alt=" " src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}"></a>		
                                        <p><b>{{ $p->product_name}}</b></p>
                                        <!-- <div class="stars">
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                                        </div> -->
                                            <!-- <h4>$ 30 <span>$ 60</span></h4> -->
                                            <h4>${{$p->amount}}</h4>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <!-- <input type="hidden" name="cmd" value="_cart">
                                                <input type="hidden" name="add" value="1">
                                                <input type="hidden" name="business" value=" ">
                                                <input type="hidden" name="item_name" value="Fortune Sunflower Oil">
                                                <input type="hidden" name="amount" value="35.99">
                                                <input type="hidden" name="discount_amount" value="1.00">
                                                <input type="hidden" name="currency_code" value="USD">
                                                <input type="hidden" name="return" value=" ">
                                                <input type="hidden" name="cancel_return" value=" "> -->
                                                <a href="{{ route('addtocart', $p->id) }}" class="btn btn-info btn-block text-center" style="margin-bottom:10px" role="button">Add to cart</a> 
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
			

        @endforeach

</div>
    </div>
</div>
@endsection

  

@section('scripts')


@endsection