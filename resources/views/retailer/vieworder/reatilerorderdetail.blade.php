@extends('retailer.rdashboard')
@section('retailer')

<div id="page-wrapper">
    <div class="table-responsive bs-example widget-shadow">
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
                                <button style="padding:5px; margin:0px"class="btn btn-success text-center bg-success">Order Not Reviewed</button>
                                
                                @elseif($orders->is_order_complete==1 && $orders->is_order_reviewed==1)
                                <button data-toggle="modal" data-target="#myModal"  style="padding:5px; margin:0px"class="btn btn-success text-center bg-success"> Order Already Reviwed</button>
                                
                                @else
                                <button style="padding:5px; margin:0px"class=" btn btn-info text-center bg-info">Not Allowed</button >
                                @endif
                            </td>
                        
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">
                            
                                <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Rate the Order</h4>
                                        </div>
                                        <div class="modal-body text-left">
                                            <b>Total Rating Given :</b><br/>
                                            {{$orders->user_star}}/5<br/>
                                            <b>User Comments</b><br/>
                                            {{$orders->user_review}}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tr>
                            <tr><th>Current Status: </th><td style="font-size:16px"> {{$orders->status}}</td></tr>
                            <tr><th>Is Order Shipped:</th><td style="font-size:16px"> 
                                @if($orders->is_order_paid==1 && $orders->is_order_complete==0 && $orders->is_order_shipped==0 && $orders->is_local_pickup==0)
                                    <strong data-toggle="modal" data-target="#shipModal"  style="padding:5px; margin:0px"class="text-center bg-success">Ship Order Now</strong>
                                @elseif($orders->is_order_shipped==1)
                                    <strong style="padding:5px; margin:0px"class="text-center bg-info">Order is Shipped</strong>
                                @elseif($orders->is_order_shipped==0 && $orders->is_local_pickup==1)
                                    <strong style="padding:5px; margin:0px"class="text-center bg-info">Not Required to Ship</strong>
                                @elseif($orders->is_order_complete==1 && $orders->is_order_shipped==0 ) 
                                    <strong style="padding:5px; margin:0px"class="text-center bg-info">Order completed </strong>
                                @else
                                <strong style="padding:5px; margin:0px"class="text-center bg-info">Order Not Paid</strong>
                                @endif
                            </td></tr>
                                <div id="shipModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <form action="{{route('saveshippingdetail')}}" method="post">
                                            @csrf
                                            <div class="modal-content">]
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add Shipping Detail</h4>
                                                </div>
                                                <div class="modal-body text-left">
                                                    Shipping Company :<br/>
                                                    <input type="text" name="shipping_company" value="{{$orders->shipping_company}}"/>
                                                    Tracking id :<br/>
                                                    <input type="text" name="tracking_id" value="{{$orders->tracking_id}}"/>
                                                    Link :<br/>
                                                    <input type="text" name="link" value="{{$orders->link}}"/>
                                                    
                                                    <input type="hidden" name="id" value="{{$orders->id}}"/>                                                
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-default" >Save Shipping Detail</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            <tr><th> Local Pickup:</th><td style="font-size:16px"> 
                                @if($orders->local_pickup==1)
                                <strong style="padding:5px; margin:0px"class="text-center bg-success"> Yes</strong>
                                @else
                                <strong style="padding:5px; margin:0px"class="text-center bg-info"> No</strong>
                                @endif
                            </td></tr>
                            <tr><th>Order Date</th><td style="font-size:16px"> {{$orders->order_date}}</td></tr>
                            @if($orders->is_order_paid==1 && $orders->is_order_complete==0)
                            <tr>
                                <td colspan="2">
                                    <button data-toggle="modal" data-target="#completeModal"  class="btn btn-success btn-block">Complete Order</button>
                                    <div id="completeModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <form action="{{route('markordercomplete')}}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Order Confirmation</h4>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        Do you want to Process Order As complete<br/>
                                                        <input type="hidden" name="id" value="{{$orders->id}}"/>                                                
                                                        <small>* After Your Submission Request Admin will decide Order Need to close or not</small>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="submit" class="btn btn-default" >Yes</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </td>
                            </tr>
                            @endif
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
                            @php
                                $productdetail = App\Models\Product::where('id',$value->productid)->first();
                                $retailerdetail = App\Models\User::where('id',$value->retailerid)
                                ->where('id',Auth::id())->first();
                                // echo json_encode($productdetail);
                                
                            @endphp
                            @if(isset($retailerdetail))
                            @php $totalproducts +=1 @endphp
                            @php $totalprice += $value->quantity*$value->price  @endphp
                            @php $totalqty += $value->quantity  @endphp
                            
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->quantity}}</td>
                                    
                                
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
                            @endif
                        @php $i++; @endphp
                            
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
