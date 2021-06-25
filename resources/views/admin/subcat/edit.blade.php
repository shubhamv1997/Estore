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
								<h4>Manage Subcategory Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

							<div class="form-body">
								<form action="{{ route ('subupdate',$subcategories->id) }}" class="form-horizontal" method="post"> 
                                @csrf
                                @method('PATCH')
                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                                     <div class="col-sm-9"> 
                                       <select name="type" id="type" class="form-control">
                                            <option selected="" disabled="">--------Select Type----</option>
                                                @if( $subcategories->type=="Mens")
                                                    <option selected="selected">Mens</option>
                                                    <option>Womens</option>
                                                    <option>Kids</option>
                                                @elseif( $subcategories->type=="Womens")
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                                     <div class="col-sm-9"> 
                                     <select name="category_id" id="category_id" class="form-control">
                                            <option selected="" disabled="">--------Select Category----</option>
                                            @foreach($categories as $c)
                                                <option value="{{ $c->id }}"{{ $c->id == $subcategories->category_id ? 'selected' : '' }}>{{ $c->category_name }}</option>
                                            @endforeach
                                      </select>
                                     
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Subcategory Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="subcategory_name" value="{{ $subcategories->subcategory_name }}" name="subcategory_name" placeholder="Subcategory Name"> 
                                     </div> 
                                </div>
                            
                              
                             <div class="form-group"> 
                               <div class="col-sm-offset-2"> 
                                    <button type="submit" class="btn btn-default">Update Subcategory</button> 
                                </div> 
                            </div>
                             </form> 
							</div>
						</div>
					</div>
				
					
					</div>
			</div>
		</div>



    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
    jQuery(document).ready(function(){
            jQuery('#type').change(function(e){

                var op=" ";

               e.preventDefault();
               jQuery.ajax({

                  url: "{{ route('getType') }}",

                  method: 'post',
                  data: {
                     '_token':"{{ csrf_token() }}",
                     'type' :$("#type").val()
                  },
                  success: function(data)
                  {
                     // alert(data);
                    op+='<option value="" selected disabled>Select Catrgory</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        op+='<option value="'+data[i].id+'">'+data[i].category_name+'</option>';
                    }
                    $('#category_id').html(" ");
                    $('#category_id').append(op);
                  }
              });
               
                
              
 
               });
            });
        
</script>


@endsection