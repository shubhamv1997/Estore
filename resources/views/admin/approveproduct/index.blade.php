@extends('admin.dashboard')
@section('admin')

<!--start Table Here-->
<div id="page-wrapper">
			<div class="main-page" >
				<div class="tables">
					<h2 class="title1">Products</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Show All Products:</h4>
                        @if(session()->get('Success'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done! Data Deleted</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

                            <table class="table table-bordered"> <thead> 
                            <tr>
                                 <th>#</th> 
                                 <th>Product Name</th>
                                  <th>Description</th> 
                                  <th>Category</th> 
                                  <th>Subcategory</th>
                                   <th>Images1</th> 
                                   <th>Images2.</th>
                                   <th>Images3</th>
                                   <th>Sale Country & City</th>
                                   <th>Retailer Name</th>
                                   <th>Tax Rate</th>
                                   <th>Approval</th>
                             </tr> 
                             </thead> 
                             <tbody> 
                             <tr>
                                 <th scope="row">1</th> 
                                 <td>Table cell</td>
                                  <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td> 
                                <td>Table cell</td> 
                                
                                <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td> 
                                <td>Table cell</td> 
                            </tr> 
                            <tr>
                                 <th scope="row">2</th>
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 
                                 <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td> 
                                <td>Table cell</td> 
                            </tr> 
                            <tr>
                                 <th scope="row">3</th>
                                <td>Table cell</td>
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 <td>Table cell</td> 
                                 
                                 <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td>
                                 <td>Table cell</td> 
                                <td>Table cell</td>     
                            </tr> 
                            
                        </tbody> 
                    </table>
					</div>
				</div>
			</div>
		</div>


@endsection