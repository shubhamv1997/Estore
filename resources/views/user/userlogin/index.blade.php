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
			<h2>Login Form</h2>
			@if(session()->get('Done'))
                <div class="alert alert-success" role="alert">
                     <strong><i class="icon fa fa-check"></i></strong> {{ session()->get('Done') }}
                </div>
            @endif

			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="{{ route('login') }}" method="post">
				@csrf	
				<input type="email" name="email" placeholder="Email Address" required=" " >
					@error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                 </span>
                   @enderror
					<input type="password" name="password" placeholder="Password" required=" " >
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
          
          <input type="hidden" value="User" name="type"/>
       
					<input type="submit" value="Login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="{{ route('registercreate') }}">Register Here</a> </a></p>
		</div>
	</div>
<!-- //login -->

@endsection