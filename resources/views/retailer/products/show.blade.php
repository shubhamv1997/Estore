@extends('retailer.rdashboard')
@section('retailer')

<!--start Table Here-->
<div id="page-wrapper">
			<div class="main-page" >
				<div class="tables">
					<h2 class="title1">Products</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Show  Product Informa:</h4>
                       
                        <table class="table table-bordered"> <thead> 
                            
                             </thead> 
                             <tbody>  
                                 
                             <tr>
                                 <th>Products Parameter</th> 
                                 <th colspan="3">Description</th>
                            </tr>
                            @foreach ($products as $p)
                                  
                            <tr>
                                  <td>Produt Name</td>
                                  <td colspan="3">{{ $p->product_name}}</td> 
                            </tr>

                            <tr>
                                  <td>Produt Pics</td>
                                  <td>
                                      <img src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}" class="img-responsive" style="width:50px;height:50px"/>
                                </td>
                                <td>
                                      <img src="{{ URL::to('/')}}/productpics/{{ $p->image_2}}" class="img-responsive" style="width:50px;height:50px"/>
                                </td>     
                                <td>     
                                      <img src="{{ URL::to('/')}}/productpics/{{ $p->image_3}}" class="img-responsive" style="width:50px;height:50px"/>
                                
                                </td> 
                            </tr>

                            
                            <tr>
                                  <td>Tax & Specification</td>
                                  <td colspan="3">{{  $p->tax }} & {{$p->specification}}</td> 
                            </tr>

                            
                            <tr>
                                  <td>Attribute Names and Values</td>
                                  <td colspan="3">{{ $p->att_name1}}: {{ $p->att_value1}} & {{ $p->att_name2}}:{{ $p->att_value2}}</td> 
                            </tr>
                            
                            @endforeach          
                        </tbody> 
                    </table>
					</div>
				</div>
			</div>
		</div>

@endsection