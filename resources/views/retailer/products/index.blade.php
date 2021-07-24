@extends('retailer.rdashboard')
@section('retailer')

<!--start Table Here-->
<div id="page-wrapper">
			<div class="main-page" >
				<div class="tables">
					<h2 class="title1">Products</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Show All UnApproval Products:</h4>
                        @if(session()->get('Success'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done! {{ session()->get('Success') }}</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

                            <table class="table table-bordered"> <thead> 
                            <tr>
                                 <th>#</th> 
                                 <th>Product Name</th>
                                 <th>Amount</th>
                                  <th>Description</th> 
                                  <th>Category</th> 
                                  <th>Subcategory</th>
                                   <th>Sale City & Country</th>
                                   <th>Retailer Name</th>
                                   <th>Status</th>
                                   <th>View</th>
                                   <th>Edit</th>
                                   
                             </thead> 
                             <tbody> 
                            
                             @if(count($products) >= 1 )
                                @foreach ($products as $p)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->product_name}}</td>
                                <td>${{ $p->amount}}</td>
                                <td>{{ $p->description}}</td>
                                <td>{{ $p->category_name}}</td>
                                <td>{{ $p->subcategory_name}}</td>
                                <td>{{ $p->city_name}},{{ $p->country_name}} </td>
                                
                                <td>{{ $p->name}}</td>
                                <td>{{ $p->status}}</td>
                                <td><a href="{{ route('retailerproductshow',$p->id)}}"><i class="fa fa-eye"></i></a></td>
                                <td><a href="{{ route('retailerproductedit',$p->id)}}"><i class="fa fa-edit"></i></a></td>
                               
                              
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