@extends('admin.dashboard')
@section('admin')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Retailer</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Edit Retailer Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif
                            <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
              
            <ul class="nav nav-tabs">
                <li><a href="#a" data-toggle="tab">Retailer Information</a></li>
                <li><a href="#b" data-toggle="tab">Retailer Bank Information</a></li>
               
            </ul>

                <div class="tab-content">
                <div class="tab-pane active" id="a">


                <form role="form" action="{{ route('retailerupdate',$retailers->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="session_id">First Name</label>
                       <input type="text" name="first_name" value="{{ $retailers->first_name}}" class="form-control" id="first_name" placeholder="First Name"/>
                       
                      
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="authorized_id">Last Name </label>
                       <input type="text" name="last_name" class="form-control" value="{{ $retailers->last_name}}" id="last_name" placeholder="Last Name"/>
                      
                  </div>
                  <div class="form-group col-md-4">
                    <label for="block_id">Email </label>
                       <input type="email" name="email" class="form-control" readonly="" value="{{ $retailers->email}}" id="email" placeholder="Email"/>
                      
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="class_id">Password </label>
                      <input type="password" name="password" class="form-control" id="password" readonly="" value="{{ $retailers->password}}"/>
                       
                      
                     
                  </div>
                  <div class="form-group col-md-4">
                     <label for="section_id">Business Name </label>
                     <input type="text" name="business_name" class="form-control" id="business_name" value="{{ $retailers->business_name}}" placeholder="Business Name"/>
                     
                       
                  </div>
                  <div class="form-group col-md-4">
                        <label for="rollno">Business Address</label>
                        <textarea name="business_address" class="form-control" id="business_address"  placeholder="Business Address">{{ $retailers->business_address }}</textarea>
                     
                  </div>
                </div>

                <div class="form-row">
                   <div class="form-group col-md-4">
                      <label for="adm_no">Mobile Numnber</label>
                      
                      <input type="text" name="mobile_number" value="{{ $retailers->mobile_number}}" class="form-control" id="mobile_number" placeholder="Mobile Number"/>
                     
                  </div>
                  <div class="form-group col-md-4">

                  <label for="business_phone">Bunisess Phone No.</label>
                  
                  <input type="text" name="business_phone" value="{{ $retailers->business_phone}}" class="form-control" id="business_phone" placeholder="Business Phone Number"/>
                     </div>
                  <div class="form-group col-md-4">

                  <label for="document_name">Document Name</label>
                  <input type="text" class="form-control" id="document_name" value="{{ $retailers->document_name }}" name="document_name" placeholder="document Name">
                    
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="front_pic">Document Front Pic</label>
                    <input type="file" class="form-control" id="front_pic" name="front_pic" placeholder="document Name">
                    <img src="{{ URL::to('/')}}/retailerpics/{{ $retailers->front_pic}}" class="img-responsive" style="width:50px;height:50px"/>
                      
               <input type="hidden" name="front_hidden" value="{{ $retailers->front_pic}}" />          

                     
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Document Back Pic</label>
                    <input type="file" class="form-control" id="back_pic" name="back_pic" placeholder="document Name">
                    <img src="{{ URL::to('/')}}/retailerpics/{{ $retailers->back_pic}}" class="img-responsive" style="width:50px;height:50px"/>
                    <input type="hidden" name="back_hidden" value="{{ $retailers->back_pic}}" />          
        
                  </div>
                  <div class="form-group col-md-4">

                     <label for="password">Business Country</label>
                     <select class="form-control" id="business_country" name="business_country" >              
                     <option selected="" disabled="">--------Select Country----</option>
                                            @foreach($countries as $c)
                                                <option value="{{ $c->id }}">{{ $c->country_name }}</option>
                                            @endforeach
                    </select>
                  
                    </div>
                 
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="password">Business City</label>
                     <select name="business_city" id="business_city" class="form-control">
                                            <option selected="" disabled="">--------Select Business City----</option>
                                            
                       </select>
                  </div>
                  <div class="form-group col-md-4">
                  <label for="password">Firstly Charges</label>
                  <select class="form-control" id="firstly_charges" name="firstly_charges">
                                        <option>-----------------Select Firstly Charges---------------</option>
                                        <option>1000</option>
                                        <option>1500</option>
                                       </select> 

                  </div>
                  <div class="form-group col-md-4">

                  <label for="password">Is Discount?</label></br>
                  <input type="radio"  id="disyes" name="discount" value="Yes"/> Yes</br>
                  <input type="radio"  id="disno" name="discount" value="no"/> No 
                  </div>
                 
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="permanent_discount_amountaddress">Discount Percentage</label>
                      <input type="text" class="form-control" id="discount_amount" readonly="readonly" value="{{ $retailers->discount_amount}}" name="discount_amount" placeholder="Discount Amount" value="0">
                  </div>

                  <div class="form-group col-md-4">
                      <label for="monthly_charges">Monthly Charges</label>
                      <input type="text" class="form-control" id="monthly_charges" value="{{ $retailers->monthly_charges}}" name="monthly_charges" placeholder="Monthly Charges">
                  </div>

                  <div class="form-group col-md-4">
                
                  <button type="submit" class="btn btn-primary">Update Retailer Information</button>
     
                </div>
                  
                  
                 
                </div>


            </form>
                </div>
                <div class="tab-pane" id="b">


                <form role="form" action="{{ route('retailerbank') }}" method="post" enctype="multipart/form-data">
                @csrf

                @foreach ($banks as $rb)
               
                <input type="hidden" name="retailer_id" value="{{ $rb->user_id}}"/>
                <div class="form-row">
                  <div class="form-group col-md-4">
                  <label for="permanent_address">Bank Name</label>
                      <input type="text" class="form-control" value="{{ $rb->bank_name}}" id="bank_name" value="{{ $retailers->bank_name}}" name="bank_name" placeholder="Bank Name">
                 
                    </div>
                  <div class="form-group col-md-4">
                  <label for="password">Account Number</label>
                     <input type="text" class="form-control" value="{{ $rb->account_number }}" id="account_number" name="account_number" placeholder="Account Number">
                 
                  </div>
                  <div class="form-group col-md-4">
                  <label for="password">IFSC Code</label>
                  <input type="text" class="form-control" id="ifsc" name="ifsc" value="{{ $rb->ifsc}}" placeholder="IFSC Code">
                 
                      
                  </div>
                 
                </div>
                <button type="submit" class="btn btn-primary">Update Retailer Bank Information</button>
                 @endforeach
            </form>
                </div>
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
            jQuery('#business_country').change(function(e){
//alert();
                var op=" ";

               e.preventDefault();
               jQuery.ajax({

                  url: "{{ route('getCity') }}",

                  method: 'post',
                  data: {
                     '_token':"{{ csrf_token() }}",
                     'business_country' :$("#business_country").val()
                  },
                  success: function(data)
                  {
                     // alert(data);
                    op+='<option value="" selected disabled>Select Business City</option>';
                    for(var i=0;i<data.length;i++)
                    {
                        op+='<option value="'+data[i].id+'">'+data[i].city_name+'</option>';
                    }
                    $('#business_city').html(" ");
                    $('#business_city').append(op);
                  }
              });
               
                
              
 
               });
            });
        
</script>
<script type="text/javascript">
    $(function () {
        $("input[name='discount']").click(function () {
            if ($("#disyes").is(":checked")) {
                $("#discount_amount").removeAttr("readonly");
                $("#discount_amount").focus();
            } else {
                $("#discount_amount").attr("readonly", "readonly");
            }
        });
    });
</script>

@endsection