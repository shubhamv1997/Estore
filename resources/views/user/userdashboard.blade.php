
<!DOCTYPE html>
<html>
<head>
<title>Ecommerce</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('usertemplate/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('usertemplate/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{ asset('usertemplate/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{ asset('usertemplate/js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('usertemplate/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('usertemplate/js/easing.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<!-- <div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>WELCOME TO OUR SHOPPING SITE.</p>
			</div>
			<div class="agile-login">
				<ul>
					<li></li>
					
					
				</ul>
			</div>
			<div class="product_list_header">  
			
		</div>
	</div> -->

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="{{ route('userhome') }}">E-mart for Apparels</a></h1>
			</div>
			<div class="product_list_header">
				<a class="btn btn-warning" href="{{ route('retailerlogin')}}">Retailer Login</a>				
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{ route('userhome') }}" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Men<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Men Collections</h6>
														
														@foreach($submen as $m)
                                                    <li><a href="{{ route('showproducts',$m->id)}}">{{ $m->subcategory_name}}</a></li>
                                                        @endforeach
                    
														</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Women<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Women Collections</h6>
														
														@foreach($subwomen as $w)
                                                    <li><a href="{{ route('showwomenproducts',$w->id)}}">{{ $w->subcategory_name}}</a></li>
                                                        @endforeach
                    
														</ul>
												</div>
												
												
											</div>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kid's<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Kids's</h6>
														@foreach($subkids as $k)
                                                    <li><a href="{{ route('showkidsproducts',$k->id)}}">{{ $k->subcategory_name}}</a></li>
                                                        @endforeach
                    
														</ul>
												</div>
												
											</div>
										</ul>
									</li>
									@guest
									<li><a href="{{ route('contactcreate') }}">Contact</a></li>

									<li><a href="{{ route('userlogin')}}">Login</a></li>
									
									<li><a href="{{ route('registercreate') }}">Register</a></li>
									@if (Route::has('register'))
									@endif
                                    @else
									<li><a href="{{ route('myorders') }}">View Order</a></li>

									<li><a  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    
									
									    	

                                        	 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
									</a></li>
									
                                       @endguest     
									

									
								</ul>
								<div class="text-right">
								@php 
									$total = 0; 
									$totalitem = 0;
								@endphp

									@foreach((array) session('cartdetail') as $id => $details)
										@php 
											$total += $details['price'] * $details['quantity'];
											$totalitem = $totalitem+1;
										@endphp

									@endforeach
									<a class="btn btn-default" href="{{ url('cart2')}}">
											<i class="fa fa-2x fa-cart-arrow-down"></i>
											<span class="text-info" style="font-size:1.6em">
												{{$totalitem}} (${{ $total }})
											</span>
									</a><!--<form action="#" method="post" class="last"> 
												<input type="hidden" name="cmd" value="_cart">
												<input type="hidden" name="display" value="1">
												<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
											</form> --> 
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->
	






@yield('user')



<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>London City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>info@example.com</li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>important Links</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ url('userhome')}}">Home</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ url('user/contact')}}">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ url('user/userregister')}}">Register</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ url('user/userlogin')}}">Login</a></li>
						
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i>If You want to sell your products online.
						</li>
							<li><i class="fa fa-arrow-right" aria-hidden="true"></i>To Become a part of our website as a Vendor the send message</li>
						</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('cart2') }}">My Cart</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{ route('retailerlogin') }}">Vendor Login</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="#">Create Account Vendor</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© 2021 E-Commerce. All rights reserved | Developed by All Partners</a></p>
			</div>
		</div>
		
	</div>	
	
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('usertemplate/js/bootstrap.min.js') }}"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="{{ asset('usertemplate/js/minicart.min.js') }}"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="{{ asset('usertemplate/js/skdslider.min.js') }}"></script>
<link href="{{ asset('usertemplate/css/skdslider.css') }}" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 
</body>
</html>