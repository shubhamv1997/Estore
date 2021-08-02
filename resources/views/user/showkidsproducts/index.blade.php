@extends('user.userdashboard')
@section('user')
<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</li>
				<li class="active">Products</li>

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
<!--- products --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
						@foreach($subkids as $sw)
			
						<li><a href="{{ route('showkidsproducts',$sw->id)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$sw->subcategory_name}}</a></li>
						@endforeach	
						
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				
			@foreach($product as $p)
			
				<div class="col-md-4 top_brand_left-1" style="margin-bottom:10px;">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<!-- <img src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}" alt=" " class="img-responsive"> -->
							</div>
							<div class="agile_top_brand_left_grid1" style="height:300px">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="{{ route('showdetails',$p->id)}}"><img class=" img-responsive" style="height:100px"title=" " alt=" " src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}"></a>		
											<p><b>{{ $p->product_name}}</b></p>
											
											<!-- <div class="stars">
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star blue-star" aria-hidden="true"></i>
												<i class="fa fa-star gray-star" aria-hidden="true"></i>
											</div> -->
												<!-- <h4>$ 30 <span>$ 60</span></h4> -->
												<h4>${{$p->amount}}</h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											<form action="#" method="post">
												<fieldset>
													<!-- <input type="hidden" name="cmd" value="_cart">
													<input type="hidden" name="add" value="1">
													<input type="hidden" name="business" value=" ">
													<input type="hidden" name="item_name" value="Fortune Sunflower Oil">
													<input type="hidden" name="amount" value="35.99">
													<input type="hidden" name="discount_amount" value="1.00">
													<input type="hidden" name="currency_code" value="USD">
													<input type="hidden" name="return" value=" ">
													<input type="hidden" name="cancel_return" value=" "> -->
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

    		</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->

@endsection