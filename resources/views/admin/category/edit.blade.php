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
								<h4>Manage Category Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

							<div class="form-body">
								<form action="{{ route ('catupdate',$categories->id) }}" class="form-horizontal" method="post"> 
                                @csrf
                                @method('PATCH')
                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="category_name" value="{{ $categories->category_name }}" name="category_name" placeholder="Category Name"> 
                                     </div> 
                                </div>
                            
                             <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-2 control-label">Type</label> 
                                    <div class="col-sm-9">
                                        <select name="type" id="type" class="form-control">
                                            <option selected="" disabled="">--------Select Type----</option>
                                                @if( $categories->type=="Mens")
                                                    <option selected="selected">Mens</option>
                                                    <option>Womens</option>
                                                    <option>Kids</option>
                                                @elseif( $categories->type=="Womens")
                                                    <option >Mens</option>
                                                    <option selected="selected">Womens</option>
                                                    <option>Kids</option>
                                                @else
                                                    <option >Mens</option>
                                                    <option >Womens</option>
                                                    <option selected="selected">Kids</option>
                                                @endif
                                                </select>
                                    </div>
                             </div>
                              
                             <div class="form-group"> 
                               <div class="col-sm-offset-2"> 
                                    <button type="submit" class="btn btn-default">Update Category</button> 
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