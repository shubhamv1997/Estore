@extends('user.userdashboard')
@section('user')
<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</li>
				<li class="active">Contact</li>

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
<!-- contact -->
<div class="about">
    <div class="w3_agileits_contact_grids">
        <div class="col-md-6 w3_agileits_contact_grid_left">
            <div class="agile_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317715.7119404761!2d-0.3817864335797612!3d51.52873519553976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sin!4v1627896344427!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="agileits_w3layouts_map_pos">
                <div class="agileits_w3layouts_map_pos1">
                    <h3>Contact Info</h3>
                    <p>1234k Avenue, 4th block, London City.</p>
                    <ul class="wthree_contact_info_address">
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>info@example.com</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>+(0123) 232 232</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 w3_agileits_contact_grid_right">
            <h2 class="w3_agile_header">Leave a<span> Message</span></h2>
            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

            <form action="{{ route('contactrstore') }}" method="post">
                @csrf
                <span class="input input--ichiro">
                    <input class="input__field input__field--ichiro" type="text" id="input-25" name="name" placeholder=" " required="" />
                    <label class="input__label input__label--ichiro" for="input-25">
                        <span class="input__label-content input__label-content--ichiro">Your Name</span>
                    </label>
                </span>
                <span class="input input--ichiro">
                    <input class="input__field input__field--ichiro" type="email" id="input-26" name="email" placeholder=" " required="" />
                    <label class="input__label input__label--ichiro" for="input-26">
                        <span class="input__label-content input__label-content--ichiro">Your Email</span>
                    </label>
                </span>
                <textarea name="message" placeholder="Your message here..." required=""></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- contact -->

@endsection