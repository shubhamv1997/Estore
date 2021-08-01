@extends('admin.dashboard')

@section('admin')
<!-- main content start-->



<div id="page-wrapper">
            <div class="main-page">
                <div class="col_3">
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-dollar icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No.of Category</strong></h5>
                                <span>{{ $category }}</span>

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Retailer</strong></h5>
                                <span><span>{{ $retailer }}</span>
</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-money user2 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Products</strong></h5>
                                <span><span>{{ $product }}</span>
</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. Of Users</strong></h5>
                                <span><span>{{ $register }}</span>
</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Orders</strong></h5>
                                <span><span>{{ $order }}</span>
</span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="clearfix"> </div>
                </div>

                <div class="row-one widgettable">
                    <div class="clearfix"> </div>
                </div>



                

                <script src="{{asset('dist/js/index1.js')}}"></script>

                <div class="charts">
                    <div class="mid-content-top charts-grids">
                        <div class="middle-content">
                            <h4 class="title">Show Order</h4>
                            <table class="table table-bordered"> <thead> 
                            <tr>
                                 <th>#</th> 
                                 <th>User Name</th>
                                  <th>Product Name</th> 
                                  <th>Quantity</th> 
                                  <th>Amount</th>
                                   <th>Order Date</th> 
                                   <th>Status</th>
                                   
                             </thead> 
                             <tbody> 
                             @if(count($u_orders) >= 1 )
                                @foreach ($u_orders as $u)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name}}</td>
                                <td>{{ $u->product_name}}</td>
                                <td>{{ $u->Quantity}}</td>
                                <td>${{ $u->amount}}</td>
                                <td>{{ $u->order_date}} </td>
                                <td>{{ $u->status}}</td>
                                
                                </tr>
                                @endforeach  
                                
                                
                                @else
                         <tr>
                                <td colspan="5">No Data Found</td>
                         </tr>
                               @endif
					
                        </tbody> 
                    </table>

                        </div>
                        <!--//sreen-gallery-cursual---->
                    </div>
                </div>

            </div>
        </div>

@endsection
