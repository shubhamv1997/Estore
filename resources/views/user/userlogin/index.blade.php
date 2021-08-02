@extends('user.userdashboard')
@section('user')


<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
				@guest
									@if (Route::has('register'))
									@endif
									@else
									<p style="float:right">Welcome: <span class="fa fa-user"></span> {{ Auth::user()->name }}</p>
									

									@endguest
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
<div class="login">
		<div class="container">
			<div class="row">
				<div class="col-md-6" style="border:1px solid gray;padding:20px">
					<h2>Login Form</h2>
						@if(session()->get('Done'))
							<div class="alert alert-danger" role="alert">
								<strong><i class="icon fa fa-check"></i></strong> {{ session()->get('Done') }}
							</div>
						@endif

						<div style="width:100%" class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
							<form action="{{ route('login') }}" method="post">
								@csrf	
								<input type="email" name="email" placeholder="Email Address" required=" " style="color:black" >
									@error('email')
								<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
								</span>
								@enderror
								<input type="password" name="password" placeholder="Password" required=" " style="color:black">
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
					
								<input type="hidden" value="User" name="type"/>
				
								<input type="submit" value="Login">
							</form>
						</div>
						{{-- <h4>For New People</h4>
						<p><a href="{{ route('registercreate') }}">Register Here</a> </a></p> --}}
					
				</div>
				<div class="col-md-6" style="border:1px solid gray;padding:20px">
					<h2>Register Here</h2>
					@if(session()->get('Done1'))
						<div class="alert alert-success" role="alert">
							<strong><i class="icon fa fa-check"></i>Account Register Succesfully! Login Now</strong> {{ session()->get('Done') }}
						</div>
					@endif
					<div class="login-form-grids" style="width:100%">
						<h5>profile information</h5>
						<form action="{{ route('registerstore')}}" method="post">
							@csrf	
							<input type="text" name="first_name" style="color:black" placeholder="First Name..." required=" " >
							<input type="text" name="last_name" style="color:black" placeholder="Last Name..." required=" " >
							<br/>
							<input type="text" name="mobile_number" style="color:black" placeholder="Mobile No...." required=" " >
							<br/>
							<textarea  name="address" placeholder="Address..." required=" " 
							style="outline: none;border:1px solid #DBDBDB;padding: 10px 10px 10px 10px;font-size: 14px;color:black;display: block;width: 100%;" ></textarea>
							
						
							<h6>Login information</h6>
							<input type="email" name="email" placeholder="Email Address" required=" " style="color:black">
							<input type="password" name="password" placeholder="Password" required=" " style="color:black">
							<input type="hidden" name="status" value="0"/>
							<input type="submit" value="Register">
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- //login -->

@endsection