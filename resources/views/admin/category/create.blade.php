@extends('admin.dashboard')
@section('admin')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Category</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add Category Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

							<div class="form-body">
								<form action="{{ route('catstore')}}" class="form-horizontal" method="post"> 
                                @csrf
                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name"> 
                                     </div> 
                                </div>
                            
                             <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-2 control-label">Type</label> 
                                    <div class="col-sm-9">
                                        <select name="type" id="type" class="form-control">
                                            <option selected="" disabled="">--------Select Type----</option>
                                            <option>Mens</option>
                                            <option>Womens</option>
                                            <option>Kids</option>
                                        </select>
                                    </div>
                             </div>
                              
                             <div class="form-group"> 
                               <div class="col-sm-offset-2"> 
                                    <button type="submit" class="btn btn-default">Add Category</button> 
                                </div> 
                            </div>
                             </form> 
							</div>
						</div>
					</div>
				
					
					</div>
			</div>
		</div>




<!--start Table Here-->
        <div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h2 class="title1">Tables</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Responsive Table:</h4>
						<table class="table table-bordered"> <thead> <tr> <th>#</th> <th>Table heading</th> <th>Table heading</th> <th>Table heading</th> <th>Table heading</th> <th>Table heading</th> <th>Table heading</th> </tr> </thead> <tbody> <tr> <th scope="row">1</th> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> </tr> <tr> <th scope="row">2</th> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> </tr> <tr> <th scope="row">3</th> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> </tr> </tbody> </table> 
					</div>
				</div>
			</div>
		</div>





@endsection