@extends('retailer.rdashboard')
@section('retailer')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Products</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add Product Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

                            <!----row start---->
                            <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">


            <ul class="nav nav-tabs">
                  <li><a href="#a" data-toggle="tab">Product Information</a></li>
                  <li><a href="#b" data-toggle="tab">Product Images Imformation</a></li>
                  <li><a href="#c" data-toggle="tab">Product Attributes Information </a></li>
                  
            </ul>

            <div class="tab-content">

            <!-----first tab code--->
              <div class="tab-pane active" id="a">
              <form role="form" action="{{ route ('retailerproductupdate',$products->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="product_name">Product Name </label>
                       <input type="text" name='product_name'value="{{ $products->product_name }}" class="form-control" id="product_name" placeholder="Product Name"/>
                       
                      
                    
                  </div>
                  <div class="form-group col-md-4">
                  <label for="amount">Amount </label>
                   
                       <input name="amount" class="form-control"value="{{ $products->amount }}" id="amount" onblur="return amt()" placeholder="Amount"/>
                      
                  </div>
                  <div class="form-group col-md-4">
                    <label for="final_amount">Final Amount </label>
                       <input type="text" name="final_amount" value="{{ $products->final_amount }}" readonly="" class="form-control" id="final_amount" placeholder="Final Amount"/>
                      
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">

                  <label for="description">Description </label>
                       <input type="text" name="description" value="{{ $products->description }}" class="form-control" id="description" placeholder="Description"/>
                    
                       
                      
                     
                  </div>
                  <div class="form-group col-md-4">

                  <label for="category_id">Category Name</label>
                      
                      <select class="form-control" id="category_id" name="category_id" >                                      
                       <option selected="" disabled="">--------Select Category----</option>
                       @foreach($categories as $cat)
                             <option value="{{ $products->category_id}}">{{ $cat->category_name }}</option>
                        @endforeach
                    
                    </select>      
                  </div>
                  <div class="form-group col-md-4">

                  <label for="subcategory_id">Subcategory Name</label>
                  
                  <select class="form-control" id="subcategory_id" name="subcategory_id" >                                      
                       <option selected="" disabled="">--------Select Subcategory----</option>
                                           
                    </select>  
                       
                  </div>
                </div>

                <div class="form-row">
                   <div class="form-group col-md-4">
                   <label for="retailer_id">Reatiler Email</label>
                  <select class="form-control" id="retailer_id" name="retailer_id" >                                      
                  @foreach($users as $u)
                             <option value="{{ $u->id }}">{{ $u->email }}</option>
                        @endforeach
                                          
                    </select>  
                     
                  </div>
                  <div class="form-group col-md-4">

                  <label for="country_id">Sale Country</label>
                    <select class="form-control" id="country_id" name="country_id" >                                       <option selected="" disabled="">--------Select Country----</option>
                         @foreach($countries as $c)
                             <option value=" {{ $products->country_id}}">{{ $c->country_name }}</option>
                        @endforeach
                 </select>
                 
                  </div>
                  <div class="form-group col-md-4">

                  <label for="city_id">Sale City</label>
                    <select name="city_id" id="city_id" class="form-control">
                             <option selected="" disabled="">--------Select Sale City----</option>
                                            
                </select>


                 
                  </div>
                </div>

                
                <div class="form-row">
                  <div class="form-group col-md-4">

                  <label for="tax">Tax</label>
                      <input type="text" class="form-control" value="{{ $products->tax}}"id="tax" name="tax" placeholder="Tax">
                        
                    
                  </div>
                  <div class="form-group col-md-4">

                  <label for="return_policy">Return Policy</label>
                      <select  class="form-control" id="return_policy" name="return_policy" >
                        
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                  
                    
                  </div>
                  <div class="form-group col-md-4">

                  <label for="specification">Specification</label>
                        <textarea class="form-control" id="specification"  name="specification" placeholder="Specification">{{ $products->specification}}</textarea>
                      

                      
                  </div>
                 
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                      

  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                     
                  </div>
                  

                 
                  
                 
                </div>

                


              </div>


            <!---end first tab--->

            <!---start tab2--->
              <div class="tab-pane" id="b">

              <form role="form" action="{{ route ('retailerproductimage') }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($product_images as $pi)
               
                  <div class="form-row">
                  <div class="form-group col-md-4">
                  <label for="image_1">Image 1 </label>
                      <input type="file" name='image_1'  class="form-control" id="image_1"/>
                      <img src="{{ URL::to('/')}}/productpics/{{ $pi->image_1}}" class="img-responsive" style="width:100px;height:100px"/>

                      
               <input type="hidden" name="hidden_image1" value="{{ $pi->image_1}}" />
               <input type="hidden" name="product_id" value="{{ $pi->product_id}}" />
                    
                  </div>
                  <div class="form-group col-md-4">
                  <label for="image_2">Image 2 </label>
                     <input type="file" name="image_2" class="form-control" id="image_2"/>
                     <img src="{{ URL::to('/')}}/productpics/{{ $pi->image_2}}" class="img-responsive" style="width:100px;height:100px"/>
                     <input type="hidden" name="hidden_image2" value="{{ $pi->image_2}}" />
               
                  </div>
                  <div class="form-group col-md-4">
                  <label for="image_3">Image 3</label>
                        <input type="file" name="image_3" class="form-control" id="image_3"/>
                        <img src="{{ URL::to('/')}}/productpics/{{ $pi->image_3}}" class="img-responsive" style="width:100px;height:100px"/>
                        <input type="hidden" name="hidden_image3" value="{{ $pi->image_3}}" />
               
                </div>
                </div>               
                

  <button type="submit" class="btn btn-primary">Update Product Images</button>
            </form>
            @endforeach


              </div>



              <!---end tab 2--->

              <!---start tab 3---->
              <div class="tab-pane" id="c">

              <form role="form" action="{{ route('retailerproductatt') }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($product_attributes as $pt)
               
                  

                <div class="form-row">
                  <div class="form-group col-md-4">

                  <label for="att_name1">Attribut Name 1</label>
                      <input type="text" class="form-control"  id="att_name1" value="{{ $pt->att_name1 }}" name="att_name1" placeholder="Attribute Name 1">
                      <input type="hidden" class="form-control"  id="product_id" value="{{ $pt->product_id }}" name="product_id" placeholder="Attribute Name 1">
                    
                    
                  </div>
                  <div class="form-group col-md-4">

                  <label for="att_value1">Attribut Value 1</label>
                      <input type="text" class="form-control" id="att_value1" value="{{ $pt->att_value1 }}" name="att_value1" placeholder="Attribute Value 1">
                    
                    
                  </div>
                  <div class="form-group col-md-4">

                  <label for="att_name2">Attribut Name 2</label>
                      <input type="text" class="form-control" id="att_name2" name="att_name2" value="{{ $pt->att_name2 }}" placeholder="Attribute Name 2">
                 

                      
                  </div>
                 
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">

                  <label for="att_value2">Attribut Value 2</label>
                      <input type="text" class="form-control" id="att_value2" name="att_value2" value="{{ $pt->att_value2 }}" placeholder="Attribute Value 2">
                 
                     
                  </div>
                  

                  <div class="form-group col-md-8">

                    
                       
  <button type="submit" class="btn btn-primary">Update Attributs</button>
                    </div>

                  
                 
                </div>

                      @endforeach
            </form>


              </div>



              <!----end tab 3---->


            </div>

              
            </div>
            <!-- /.col -->
            <div class="col-md-1"></div>
            <!-- /.col -->
          </div>
          <!-- /.row -->




                            
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
            jQuery('#country_id').change(function(e){
//alert();
                var op=" ";

               e.preventDefault();
               jQuery.ajax({

                  url: "{{ route('getSaleCity') }}",

                  method: 'post',
                  data: {
                     '_token':"{{ csrf_token() }}",
                     'country_id' :$("#country_id").val()
                  },
                  success: function(data)
                  {
                      alert(data);
                    op+='<option value="" selected disabled>Select Sale City</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        op+='<option value="'+data[i].id+'">'+data[i].city_name+'</option>';
                    }
                    $('#city_id').html(" ");
                    $('#city_id').append(op);
                  }
              });
               
                
              
 
               });
            });
        
</script>


<script>
    jQuery(document).ready(function(){
            jQuery('#category_id').change(function(e){
   alert();
                var op=" ";

               e.preventDefault();
               jQuery.ajax({

                  url: "{{ route('getCategory') }}",

                  method: 'post',
                  data: {
                     '_token':"{{ csrf_token() }}",
                     'category_id' :$("#category_id").val()
                  },
                  success: function(data)
                  {
                      alert(data);
                    op+='<option value="" selected disabled>Select Subcategory</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        op+='<option value="'+data[i].id+'">'+data[i].subcategory_name+'</option>';
                    }
                    $('#subcategory_id').html(" ");
                    $('#subcategory_id').append(op);
                  }
              });
               
                
              
 
               });
            });
        
</script>


<script type="text/javascript">
    $(function () {
        $("input[name='discount']").click(function () {
            if ($("#disyes").is(":checked")) {
                $("#discount_amount").removeAttr("disabled");
                $("#discount_amount").focus();
            } else {
                $("#discount_amount").attr("disabled", "disabled");
            }
        });
    });



    function amt()
    {
      //alert();
      var a =parseInt(document.getElementById("amount").value);
      var b= parseInt(a*10/100);

      var f_amount= a + b ;
     // alert(f_amount);
      document.getElementById('final_amount').value=f_amount;

    }
</script>


@endsection