@extends('user.userdashboard')
@section('user')


<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			@if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
             @endif
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="{{ route('registerstore')}}" method="post">
				@csrf	
				<input type="text" name="first_name" placeholder="First Name..." required=" " >
					<input type="text" name="last_name"  placeholder="Last Name..." required=" " >
</br>
					<input type="text" name="mobile_number" placeholder="Mobile No...." required=" " >
                       </br>
					<textarea  name="address" placeholder="Address..." required=" " 
                    style="outline: none;border:1px solid #DBDBDB;padding: 10px 10px 10px 10px;font-size: 14px;color: #999;display: block;width: 100%;" ></textarea>
                    </br>

                    
				
				<h6>Login information</h6>
					<input type="email" name="email" placeholder="Email Address" required=" " >
					<input type="password" name="password" placeholder="Password" required=" " >
					<input type="hidden" name="status" value="0"/>
					<input type="submit" value="Register">
				</form>
			</div>
			<div class="register-home">
				<a href="{{ route('home') }}">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->


@endsection