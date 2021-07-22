@extends('admin.dashboard')
@section('admin')

<!--start Table Here-->
<div id="page-wrapper">
			<div class="main-page" >
				<div class="tables">
					<h2 class="title1">Order</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Show All Order:</h4>
                        @if(session()->get('Success'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done! {{ session()->get('Success') }}</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

                            <table class="table table-bordered"> <thead> 
                            <tr>
                                 <th>#</th> 
                                 <th>User Name</th>
                                 <th>Retailer Name</th>
                                  <th>Product Name</th> 
                                  <th>Quantity</th> 
                                  <th>Amount</th>
                                   <th>Order Date</th> 
                                   <th>Status</th>
                                   <th>Approval</th>
                                   
                             </thead> 
                             <tbody> 
                                @php
                                $i=0;
                                @endphp
                             @if(count($u_orders) >= 1 )
                                @foreach ($u_orders as $u)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name}}</td>
                                <td>
                                    @php
                                    echo $retatiler[$i]->email;
                                    $i++;
                                    @endphp
                                </td>
                                <td>{{ $u->product_name}}</td>
                                <td>{{ $u->Quantity}}</td>
                                <td>{{ $u->amount}}</td>
                                <td>{{ $u->order_date}} </td>
                                <td>{{ $u->status}}</td>
                                @if($u->status=='Pending')

                                <td><a href="{{route('orderapp',$u->id)}}"><button class="btn btn-warning">Approval</a></button></td>
                              @else
                              <td>Allready Approval</td>
                              @endif
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
				</div>
			</div>
		</div>


@endsection