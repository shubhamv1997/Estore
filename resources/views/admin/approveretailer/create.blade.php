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
								<h4>Add Retailer Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

							<div class="form-body">
								<form action="{{ route('retailerstore')}}" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                                @csrf
                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"> 
                                     </div> 
                                </div>
                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                     <div class="col-sm-9"> 
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Email"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                     <div class="col-sm-9"> 
                                       <input type="password" class="form-control" id="password" name="password" placeholder="Password"> 
                                     </div> 

                                </div>
                              <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Business Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Business Address</label>
                                     <div class="col-sm-9"> 
                                       <textarea class="form-control" id="business_address" name="business_address" placeholder="Business Address"> 
                                        </textarea>
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mobile Number</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Bunisess Phone No.</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="business_phone" name="business_phone" placeholder="Business Phone Number"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Document Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Document Name"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Document Front Pic</label>
                                     <div class="col-sm-9"> 
                                       <input type="file" class="form-control" id="front_pic" name="front_pic" placeholder="Document Front Pic"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Document Back Pic</label>
                                     <div class="col-sm-9"> 
                                       <input type="file" class="form-control" id="back_pic" name="back_pic" placeholder="Document Back Pic"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Business Country</label>
                                     <div class="col-sm-9"> 
                                       <select class="form-control" id="business_country" name="business_country" >                                       <option selected="" disabled="">--------Select Country----</option>
                                            @foreach($countries as $c)
                                                <option value="{{ $c->id }}">{{ $c->country_name }}</option>
                                            @endforeach
                                      </select>
                                     </div> 
                                </div>


                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Business City</label>
                                     <div class="col-sm-9"> 

                                     <select name="business_city" id="business_city" class="form-control">
                                            <option selected="" disabled="">--------Select Business City----</option>
                                            
                                    </select>
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Firstly Charges</label>
                                     <div class="col-sm-9"> 
                                       <select class="form-control" id="firstly_charges" name="firstly_charges">
                                        <option>-----------------Select Firstly Charges---------------</option>
                                        <option>1000</option>
                                        <option>1500</option>
                                       </select> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Is Discount?</label>
                                     <div class="col-sm-9"> 
                                       <input type="radio"  id="disyes" name="discount" value="Yes"/> Yes
                                       <input type="radio"  id="disno" name="discount" value="no"/> No
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Discount Percentage</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="discount_amount" disabled="disabled" name="discount_amount" placeholder="Discount Amount" value="0"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Monthly Charges</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="monthly_charges" name="monthly_charges" placeholder="Monthly Charges"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Bank Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">Account Number</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number"> 
                                     </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">IFSC Code</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="IFSC Code"> 
                                     </div> 
                                </div>

                                

                             <div class="form-group"> 
                               <div class="col-sm-offset-2"> 
                                    <button type="submit" class="btn btn-default">Add Retailer</button> 
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
                $("#discount_amount").removeAttr("disabled");
                $("#discount_amount").focus();
            } else {
                $("#discount_amount").attr("disabled", "disabled");
            }
        });
    });
</script>

@endsection