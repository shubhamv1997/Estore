@extends('user.userdashboard')
@section('user')


<!-- main-slider -->
<ul id="demo1">
			<li>
				<img src="{{ asset('usertemplate/images/1a.png') }}" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>All Men's Products Here</h3>
				</div>
			</li>
			<li>
				<img src="{{ asset('usertemplate/images/1b.png') }}" alt="" />
				  <div class="slide-desc">
					<h3>All Women's Products Here</h3>
				</div>
			</li>
			
			<li>
				<img src="{{ asset('usertemplate/images/1c.png') }}" alt="" />
				<div class="slide-desc">
					<h3>All Kid's Products Here</h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	
	
<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="{{ asset('usertemplate/images/1a.png') }}" class="img-responsive" alt=""/>
								
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="{{ asset('usertemplate/images/p2.jpg') }}" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="{{ asset('usertemplate/images/p2.png') }}" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="{{ asset('usertemplate/images/111.jpg') }}" class="img-responsive" alt=""/>
								
								
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
<!--banner-bottom-->
<!--brands-->
	<div class="brands">
		<div class="container">
		<h3>Women's Store</h3>
			<div class="brands-agile">

				@foreach($subwomen as $sub)
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="{{ route('showwomenproducts',$sub->id)}}">{{ $sub->subcategory_name}}</a></p>
					</div>
					<br/>
				</div>
			
				@endforeach
				
				<div class="clearfix"></div>
			</div>
			
		</div>
	</div>	
<!--//brands-->
<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>New Products For Kids</h3>
				<div class="agile_top_brands_grids">

					@foreach($product as $p)
			

					<div class="col-md-3 top_brand_left-1">
						<div class="hover14 column">
							<div class="agile_top_brand_left_grid">
								<div class="agile_top_brand_left_grid_pos">
									<img src="" alt=" " class="img-responsive">
								</div>
								<div class="agile_top_brand_left_grid1">
									<figure>
										<div class="snipcart-item block">
											<div class="snipcart-thumb">
												<a href="{{ route('showdetails',$p->id)}}"><img title=" " style="height:100px" alt=" " src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}"></a>		
												<p>${{$p->product_name}}</p>
												<div class="stars">
														</div>
													<h4>${{$p->amount}}</h4>
											</div>
											<div class="snipcart-details top_brand_home_details">
												<form action="#" method="post">
													<fieldset>

														<a href="{{ route('addtocart', $p->id) }}" class="btn btn-info btn-block text-center" style="margin-bottom:10px" role="button">Add to cart</a>
													
															</fieldset>
												</form>
											</div>
										</div>
									</figure>
								</div>
							</div>
						</div>
					</div>

					@endforeach
						<div class="clearfix"> </div>
				</div>
		</div>
	</div>
<!-- //new -->

@endsection