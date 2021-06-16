@extends('admin.dashboard')
@section('admin')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Subcategory</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add Subcategory Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

							<div class="form-body">
								<form action="{{ route('substore')}}" class="form-horizontal" method="post"> 
                                @csrf
                                
                            
                             <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-2 control-label">Select Category</label> 
                                    <div class="col-sm-9">
                                        <select name="category_name" id="category_name" class="form-control">
                                            <option selected="" disabled="">--------Select Category----</option>
                                            @foreach($categories as $c)
                                                <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                             </div>

                             <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Subcategory Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Subcategory Name"> 
                                     </div> 
                                </div>
                              
                             <div class="form-group"> 
                               <div class="col-sm-offset-2"> 
                                    <button type="submit" class="btn btn-default">Add Subcategory</button> 
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