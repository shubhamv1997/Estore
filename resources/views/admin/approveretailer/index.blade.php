@extends('admin.dashboard')
@section('admin')

<!--start Table Here-->
<div id="page-wrapper">
			<div class="main-page" >
				<div class="tables">
					<h2 class="title1">Retailer</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Show Retailer Data:</h4>
                        @if(session()->get('Success'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

						<table class="table table-bordered">
                             <thead> 
                                <tr> 
                                    <th>#</th> 
                                    
                                    <th>Retailer Name</th>
                                    <th>Email</th>
                                    <th>Business</th> 
                                    <th>Business Address</th> 
                                    <th>Mobile Number</th> 
                                    <th>Business Phone</th> 
                                    <th>document_name</th> 
                                    <th>Front Pic</th> 
                                    <th>Back Pic</th> 
                                    <th>Business Country</th> 
                                    <th>Business City</th> 
                                    <th>Firstly Charges</th> 
                                    <th>Discount</th> 
                                    <th>Discount Amount</th> 
                                    <th>Monthly Charges</th> 
                                    <th>After Discount</th> 
                                    
                                    <th>Edit</th>
                                    
                                </tr> 
                            </thead> 
                            <tbody> 
                            @if(count($Retailers) >= 1 )
                                @foreach ($Retailers as $r)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->first_name}} {{ $r->last_name}}</td>
                                <td>{{ $r->email}}</td>
                                <td>{{ $r->business_name}}</td>
                                <td>{{ $r->business_address}}</td>
                                <td>{{ $r->mobile_number}}</td>
                                <td>{{ $r->business_phone}}</td>
                                <td>{{ $r->document_name}}</td>
                                <td>
                                <img src="{{ URL::to('/')}}/retailerpics/{{ $r->front_pic}}" class="img-responsive" style="width:100px;height:100px"/>
                                </td>
                                <td><img src="{{ URL::to('/')}}/retailerpics/{{ $r->back_pic}}" class="img-responsive" style="width:100px;height:100px"/>
                                </td>
                                <td>{{ $r->country_name}}</td>
                                <td>{{ $r->city_name}}</td>
                                <td>{{ $r->firstly_charges}}</td>
                                <td>{{ $r->discount}}</td>
                                <td>{{ $r->discount_amount}}</td>
                                <td>{{ $r->monthly_charges}}</td>
                                <td>{{ $r->after_discount}}</td>
 
                                <td><a href="{{ route('retaileredit',$r->id)}}"><i class="fa fa-edit"></i></a></td>
                                
                              
                                </tr>
                                @endforeach
                             </tbody>
                         </table> 
                         @else
                         <tr>
                                <td colspan="5">No Data Found</td>
                         </tr>
                            
                        @endif
					</div>
				</div>
			</div>
		</div>


@endsection