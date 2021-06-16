@extends('admin.dashboard')
@section('admin')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Brand</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Manage Brand Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

							<div class="form-body">
								<form action="{{ route ('brandupdate',$brands->id) }}" class="form-horizontal" method="post"> 
                                @csrf
                                @method('PATCH')
                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="brand_name" value="{{ $brands->brand_name }}" name="brand_name" placeholder="Brand Name"> 
                                     </div> 
                                </div>
                            
                              
                             <div class="form-group"> 
                               <div class="col-sm-offset-2"> 
                                    <button type="submit" class="btn btn-default">Update Brand</button> 
                                </div> 
                            </div>
                             </form> 
							</div>
						</div>
					</div>
				
					
					</div>
			</div>
		</div>



@endsection