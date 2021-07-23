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
                                 <th>Products Parameter</th> 
                                 <th>Description</th>
                            </tr>
                            @foreach ($products as $p)
                                  
                            <tr>
                                  <td>Produt Name</td>
                                  <td>{{ $p->product_name}}</td> 
                            </tr>
                            @endforeach
                             </thead> 
                             <tbody>              
                        </tbody> 
                    </table>
                   
					</div>
				</div>
			</div>
		</div>

@endsection