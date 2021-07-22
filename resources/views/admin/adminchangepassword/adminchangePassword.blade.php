@extends('admin.dashboard')
@section('admin')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">Change Password</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Change Password Form :</h4>
							</div>
                            @if(session()->get('Success'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Success') }}
                            </div>
                            @endif

                            <div class="row">
            <div class="col-md-1"> </div>
            <div class="col-md-10">
            <form role="form" action="{{ route('retailerchangestore') }}" method="post">
                @csrf
                         @foreach ($errors->all() as $error)

                            <p class="text-danger">{{ $error }}</p>

                         @endforeach 

              
              
                <div class="form-group">
                  <label for="password">Current Password</label>
                  <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                 
                </div>
                <div class="form-group">
                  <label for="new_password">New Password</label>
                   <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                 
                </div>

                <div class="form-group">
                  <label for="new_confirm_password">Confirm New Password</label>
                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                  
                </div>
            
             
                
         
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Password</button>
              </div>
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
@endsection