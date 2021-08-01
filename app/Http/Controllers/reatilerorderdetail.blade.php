@extends('user.userdashboard')
@section('user')

<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">My Order</li>
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
<!-- login -->

<div class="login" style="padding:1em">
		<div class="container">
			<div class="row">
                <div class="col-md-12" style="padding:20px">
					<div class="login-form-grids" style="width:100%;margin:0px">
						<div class="col-md-4" style="font-size:18px">
                            <h3>User Detail</h3><br/>
                            <table class="table table-responsive">
                                <tr><th>Name:</th><td style="font-size:16px"> {{$orders->name}}</td></tr>
                                <tr><th>Email:</th><td style="font-size:16px">  {{$orders->email}}</td></tr>
                                <tr><th>Billing Address: </th><td style="font-size:16px"> {{$orders->billing_address}}</td></tr>
                                <tr><th>City:</th><td style="font-size:16px">  {{$orders->city}}</td></tr>
                                <tr><th>Pincode:</th><td style="font-size:16px">  {{$orders->pincode}}</td></tr>
                            </table>
                        </div>
						<div class="col-md-4"  style="font-size:18px;text-align:right">
                        </div>
						<div class="col-md-4"  style="font-size:18px;text-align:right">
                            <h3>Order Detail</h3><br/>
                            <table style="text-align:right" class="table table-responsive">
                                <tr><th>Order No:</th><td style="font-size:16px"> {{$orders->id}}</td></tr>
                                <tr><th>Is Order Paid:</th><td style="font-size:16px"> 
                                    @if($orders->is_order_paid==1)
                                    <strong style="padding:5px; margin:0px"class="text-center bg-success"> Order Paid</strong>
                                    @else
                                    <strong style="padding:5px; margin:0px"class="text-center bg-info"> Payment failed</strong>
                                    @endif
                                </td></tr>
                                <tr><th>Rating:</th><td style="font-size:16px"> 
                                    @if($orders->is_order_complete==1&& $orders->is_order_reviewed==0)
                                    <button  data-toggle="modal" data-target="#myModal"  style="padding:5px; margin:0px"class="btn btn-success text-center bg-success"> Rate Order</button>
                                    
                                    @elseif($orders->is_order_complete==1 && $orders->is_order_reviewed==1)
                                    <button style="padding:5px; margin:0px"class="btn btn-success text-center bg-success"> Order Already Reviwed</button>
                                    
                                    @else
                                    <button style="padding:5px; margin:0px"class=" btn btn-info text-center bg-info">Not Allowed</button >
                                    @endif
                                </td>
                            
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                  
                                      <!-- Modal content-->
                                      <form action="{{route('saveorderrating')}}" method="post">
                                        @csrf
                                        <div class="modal-content">]
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Rate the Order</h4>
                                            </div>
                                            <div class="modal-body text-left">
                                                Total Rating Given :<br/>
                                                <select class="form-control" name="user_star">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select><br/>
                                                <input type="hidden" name="id" value="{{$orders->id}}"/>
                                                User Comments<br/>
                                                    <textarea  class="form-control"name="user_review"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-default" >Save Rating</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </tr>
                                <tr><th>Current Status: </th><td style="font-size:16px"> {{$orders->status}}</td></tr>
                                <tr><th>Is Order Shipped:</th><td style="font-size:16px"> 
                                    @if($orders->is_order_shipped==1)
                                    <strong style="padding:5px; margin:0px"class="text-center bg-success"> Order Shipped</strong>
                                    @else
                                    <strong style="padding:5px; margin:0px"class="text-center bg-info"> Not Shipped</strong>
                                    @endif
                                </td></tr>
                                <tr><th> Local Pickup:</th><td style="font-size:16px"> 
                                    @if($orders->local_pickup==1)
                                    <strong style="padding:5px; margin:0px"class="text-center bg-success"> Yes</strong>
                                    @else
                                    <strong style="padding:5px; margin:0px"class="text-center bg-info"> No</strong>
                                    @endif
                                </td></tr>
                                <tr><th>Order Date</th><td style="font-size:16px"> {{$orders->order_date}}</td></tr>

                            </table>
                                
                        </div>
                        <div class="col-md-12" style="padding:30px 0px;">
                        <table class="table text-center table-responsive table-bordered table-dark table-striped">
                            <tr>
                                <th class="text-center">Srno</th>
                                <th class="text-center">Name</th> 
                                <th class="text-center">Quantity</th> 
                                <th class="text-center">Product Image</th> 
                                <th class="text-center">Retailer</th> 
                                <th class="text-center">Price/Product</th> 
                            </tr>
                            @php $totalproducts=0; $totalprice=0; $totalqty=0; @endphp
                            @php $i=1;  @endphp
                            @foreach(json_decode($orders->products_detail) as $key=>$value)
                                @if($value->retailerid==Auth::id())
                                
                                    @php $totalproducts +=1 @endphp
                                    @php $totalprice += $value->quantity*$value->price  @endphp
                                    @php $totalqty += $value->quantity  @endphp

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->quantity}}</td>
                                        
                                        @php
                                            $productdetail = App\Models\Product::where('id',$value->productid)->first();
                                            $retailerdetail = App\Models\User::where('id',$value->retailerid)->first();
                                            // echo json_encode($productdetail);
                                        @endphp
                                        <td>
                                            @if(isset($productdetail) && isset($productdetail->pics) && $productdetail->pics!="")
                                            <img src="{{ URL::to('/')}}/productpics/{{ $productdetail->pics}}"
                                            class="img img-responsive" style="height:100px;width:100px"/>
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{$retailerdetail->name}}</td>
                                        <td>{{$value->price}}</td>
                                    </tr>
                                @php $i++; @endphp
                            @endif;
                            @endforeach
                            <tr>
                                <td colspan="2"></td>
                                <td >Products- {{$totalproducts}} (Qty: {{$totalqty}})</td>
                                <td colspan="2"></td>
                            <td class="bg-success">{{$totalprice}}</td>
                            </tr>
                        </table>
                        </div>
                        <div class="clearfix"></div>
                        
					</div>					
				</div>
			</div>
		</div>
</div>
<!-- //login -->

@endsection
ā