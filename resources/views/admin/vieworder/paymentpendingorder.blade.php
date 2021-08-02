@extends('admin.dashboard')
@section('admin')

<!--start Table Here-->
<div id="page-wrapper">
    <div class="main-page" >
            
        <div class="login" style="padding:1em">
                <div class="row">
                    <div class="col-md-12" style="padding:20px">
                        <div class="login-form-grids">
                            <h4>All Payment Pending Order:</h4>
                        
                                <table class="table text-center table-responsive table-bordered table-dark table-striped">
                                <tr>
                                    <th>Srno</th>
                                    <th>Order Id</th>
                                    <th>Products Detail</th>                                
                                    <th>Total Products</th>                                
                                    <th>Total Amount</th>
                                    <th>Payment Status</th>
                                    <th>Local Pickup</th>
                                    <th>Current Status</th>
                                    <th>Operation </th>
                                </tr>
                                @php $i=1;  @endphp
                            @foreach($orders as $key=>$value)
                                <tr>
                                    <td>{{ $i}}</td>
                                    <td>{{ $value->id}}</td>
                                    <td>
                                        <table class="table table-bordered text-left" style="margin:0px;padding:0px;">
                                            @foreach(json_decode($value->products_detail) as $pkey=>$pvalue)
                                                @php $totalproducts=0; $totalprice=0; @endphp

                                                @php $totalproducts +=1 @endphp

                                                <tr>
                                                    <td width="50px">{{$pvalue->name}}</td>
                                                    <td>{{$pvalue->quantity}}</td>
                                                </tr>
                                                @php $totalprice += $pvalue->quantity*$pvalue->price  @endphp

                                            @endforeach
                                        </table>
                                    </td>
                                    <td>{{ $totalproducts}}</td>
                                    <td>{{ $totalprice}}</td>
                                    <td>
                                        @if($value->is_order_paid==1)
                                        <h5 style="padding:10px;margin:0px"class="text-center bg-success"> Order Paid</h5>
                                        @else
                                        <h5 style="padding:10px;margin:0px"class="text-center bg-info"> Payment failed</h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if($value->localpickup==1)
                                        <h5 style="padding:10px;margin:0px"class="text-center bg-success"> Yes</h5>
                                        @else
                                        <h5 style="padding:10px;margin:0px"class="text-center bg-info">No</h5>
                                        @endif
                                    </td>
                                    <td>{{ $value->status}}</td>
                                    <td>
                                        <a href="{{ route('adminorderdetail', $value->id) }}" class="btn btn-warning btn-block">
                                            Detail
                                        </a>
                                    </td>
                                @php $i++; @endphp

                                </tr>
                            @endforeach
                            </table>
                        </div>					
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection