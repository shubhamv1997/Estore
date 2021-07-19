@extends('retailer.rdashboard')
@section('retailer')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Retailer</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4> Retailer Profile :</h4>
							</div>
                            @if(session()->get('Success'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Success') }}
                            </div>
                            @endif
                            <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
              
              
              <form role="form" action="{{ route('changeprofilestore') }}" method="post" enctype="multipart/form-data">
                @csrf

                @foreach ($retailers as $r)
                               
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="session_id">First Name</label>
                       <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $r->first_name }}" placeholder="First Name"/>
                       
                      
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="authorized_id">Last Name </label>
                       <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $r->last_name }}" placeholder="Last Name"/>
                      
                  </div>
                  <div class="form-group col-md-4">
                    <label for="block_id">Email </label>
                       <input type="email" name="email" readonly="" class="form-control" id="email" placeholder="Email" value="{{ $r->email }}"/>
                      
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="class_id">Password </label>
                      <input type="password" name="password" readonly="" class="form-control" id="password" value="{{ $r->password }}"/>
                      
                      
                     
                  </div>
                  <div class="form-group col-md-4">
                     <label for="section_id">Business Name </label>
                     <input type="text" name="business_name" class="form-control" value="{{ $r->business_name }}" id="business_name" placeholder="Business Name"/>
                     
                       
                  </div>
                  <div class="form-group col-md-4">
                        <label for="rollno">Business Address</label>
                        <textarea name="business_address" class="form-control" id="business_address" placeholder="Business Address"> {{ $r->business_address}}</textarea>
                     
                  </div>
                </div>

                <div class="form-row">
                   <div class="form-group col-md-4">
                      <label for="adm_no">Mobile Number</label>
                      
                      <input type="text" name="mobile_number" class="form-control" id="mobile_number" value="{{ $r->mobile_number }}" placeholder="Mobile Number"/>
                     
                  </div>
                  <div class="form-group col-md-4">

                  <label for="student_name">Bunisess Phone No.</label>
                  
                  <input type="text" name="business_phone" value="{{ $r->business_phone}}" class="form-control" id="business_phone" placeholder="Business Phone Number"/>
                     </div>
                  <div class="form-group col-md-4">

                  <button type="submit" class="btn btn-primary">Submit</button>
                     
                  </div>
     
                 
                </div>
            @endforeach
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