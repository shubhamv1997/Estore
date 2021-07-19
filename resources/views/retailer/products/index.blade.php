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
                                   <th>Images1</th> 
                                   <th>Images2.</th>
                                   <th>Images3</th>
                                   <th>Sale City & Country</th>
                                   <th>Retailer Name</th>
                                   <th>Tax Rate</th>
                                   <th>Specfications</th>
                                   <th>Attribute Names and Values</th>
                                   
                                   <th>Status</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                                   
                             </thead> 
                             <tbody> 
                            
                             @if(count($products) >= 1 )
                                @foreach ($products as $p)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->product_name}}</td>
                                <td>{{ $p->amount}}</td>
                                <td>{{ $p->description}}</td>
                                <td>{{ $p->category_name}}</td>
                                <td>{{ $p->subcategory_name}}</td>
                                <td>
                                <img src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}" class="img-responsive" style="width:100px;height:100px"/>
                                 </td>
                                <td><img src="{{ URL::to('/')}}/productpics/{{ $p->image_2}}" class="img-responsive" style="width:100px;height:100px"/>
                                 </td>
                                <td><img src="{{ URL::to('/')}}/productpics/{{ $p->image_3}}" class="img-responsive" style="width:100px;height:100px"/>
                                </td>
                                <td>{{ $p->city_name}},{{ $p->country_name}} </td>
                                
                                <td>{{ $p->name}}</td>
                                <td>{{ $p->tax }}</td>
                                <td>{{ $p->specification}}</td>
                                <td>{{ $p->att_name1}}:{{ $p->att_value1}}/{{ $p->att_name2}}:{{ $p->att_value2}}</td>
                                <td>{{ $p->status}}</td>
                                <td><a href="{{ route('retailerproductedit',$p->id)}}"><i class="fa fa-edit"></i></a></td>
                                <td><form action="{{ route('retailerproductdestroy',$p->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button class="fa fa-times text-danger text btn btn-outline-danger"type="submit"></button>
                                </form>
                                </td>
                              
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