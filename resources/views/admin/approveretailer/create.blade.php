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
                            <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
              
              
              <form role="form" action="{{ route('retailerstore') }}" method="post" enctype="multipart/form-data">
                @csrf

                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="session_id">First Name</label>
                       <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name"/>
                       
                       @foreach($errors->get('first_name') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
 
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="authorized_id">Last Name </label>
                       <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name"/>
                      
                       @foreach($errors->get('last_name') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                  <div class="form-group col-md-4">
                    <label for="block_id">Email </label>
                       <input type="email" name="email" class="form-control" id="email" placeholder="Email"/>
                      
                       @foreach($errors->get('email') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="class_id">Password </label>
                      <input type="password" name="password" class="form-control" id="password"/>
                       
                      @foreach($errors->get('password') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                      
                     
                  </div>
                  <div class="form-group col-md-4">
                     <label for="section_id">Business Name </label>
                     <input type="text" name="business_name" class="form-control" id="business_name" placeholder="Business Name"/>
                     
                     @foreach($errors->get('business_name') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                       
                  </div>
                  <div class="form-group col-md-4">
                        <label for="rollno">Business Address</label>
                        <textarea name="business_address" class="form-control" id="business_address" placeholder="Business Address"></textarea>
                     
                        @foreach($errors->get('business_address') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                </div>

                <div class="form-row">
                   <div class="form-group col-md-4">
                      <label for="adm_no">Mobile Numnber</label>
                      
                      <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Mobile Number"/>
                     
                      @foreach($errors->get('mobile_number') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                  <div class="form-group col-md-4">

                  <label for="student_name">Bunisess Phone No.</label>
                  
                  <input type="text" name="business_phone" class="form-control" id="business_phone" placeholder="Business Phone Number"/>
                
                  @foreach($errors->get('business_phone') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach     
                
                </div>
                  <div class="form-group col-md-4">

                  <label for="contact">Document Name</label>
                  <input type="text" class="form-control" id="document_name" name="document_name" placeholder="document Name">
                    
                  @foreach($errors->get('document_name') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="gender">Document Front Pic</label>
                    <input type="file" class="form-control" id="front_pic" name="front_pic" placeholder="document Name">
                    
                    @foreach($errors->get('front_pic') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach

                     
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Document Back Pic</label>
                    <input type="file" class="form-control" id="back_pic" name="back_pic" placeholder="document Name">
                   
                    @foreach($errors->get('back_pic') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                  <div class="form-group col-md-4">

                     <label for="password">Business Country</label>
                     <select class="form-control" id="business_country" name="business_country" >              
                     <option selected="" disabled="">--------Select Country----</option>
                                            @foreach($countries as $c)
                                                <option value="{{ $c->id }}">{{ $c->country_name }}</option>
                                            @endforeach
                    </select>
                  
                    @foreach($errors->get('business_country') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                    </div>
                 
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="password">Business City</label>
                     <select name="business_city" id="business_city" class="form-control">
                                            <option selected="" disabled="">--------Select Business City----</option>
                                            
                       </select>

                       
                       @foreach($errors->get('business_city') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                  <div class="form-group col-md-4">
                  <label for="password">Firstly Charges</label>
                  <select class="form-control" id="firstly_charges" name="firstly_charges">
                                        <option>-----------------Select Firstly Charges---------------</option>
                                        <option>1000</option>
                                        <option>1500</option>
                                       </select> 

                      @foreach($errors->get('firstly_charges') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                  </div>
                  <div class="form-group col-md-4">

                  <label for="password">Is Discount?</label></br>
                  <input type="radio"  id="disyes" name="discount" value="Yes"/> Yes</br>
                  <input type="radio"  id="disno" name="discount" value="no"/> No 
                
                  @foreach($errors->get('discount') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach  
                </div>
                 
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="permanent_address">Discount Percentage</label>
                      <input type="text" class="form-control" id="discount_amount" readonly="readonly" name="discount_amount" placeholder="Discount Amount" value="0">
                 
                      @foreach($errors->get('discount_amount') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                 
                    </div>

                  <div class="form-group col-md-4">
                      <label for="permanent_address">Monthly Charges</label>
                      <input type="text" class="form-control" id="monthly_charges" name="monthly_charges" placeholder="Monthly Charges">
                  
                      @foreach($errors->get('monthly_charges') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                    </div>

                  <div class="form-group col-md-4">
                      <label for="permanent_address">Bank Name</label>
                      <input type="text" class="form-control" id="bank_name" name="bank_name" placeholder="Bank Name">
                  
                      @foreach($errors->get('bank_name') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                    </div>
                  
                  
                 
                </div>

                
                <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="password">Account Number</label>
                     <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number">
                  
                  
                     @foreach($errors->get('account_number') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach
                    </div>
                  <div class="form-group col-md-4">
                  <label for="password">IFSC Code</label>
                  <input type="text" class="form-control" id="ifsc" name="ifsc" placeholder="IFSC Code">
                
                  @foreach($errors->get('ifsc') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach  
                </div>
                  <div class="form-group col-md-4">

                  <label for="profile_pic">Profile Pic</label>
                  <input type="file" class="form-control" id="profile_pic" name="profile_pic" placeholder="Profile Pic">
                
                  @foreach($errors->get('profile_pic') as $error)
                              <span class="help-block" style="color:red;">{{ $error }}</span>
                       @endforeach  
                
                      
                  </div>
                 
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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