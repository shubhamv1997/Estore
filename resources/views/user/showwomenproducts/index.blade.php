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
					@foreach($subwomen as $sw)
			
						<li><a href="{{ route('showwomenproducts',$sw->id)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{$sw->subcategory_name}}</a></li>
						@endforeach	
						
				</div>																																												
			</div>
			<div class="col-md-8 products-right">
				
			@foreach($product as $p)
			
			<div class="col-md-4" style="border:1px solid #999;margin:10px;width:30.33333333% !important;">

			<img src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}" alt=" " class="img-responsive"/>
				<a href="{{ route('showdetails',$p->id)}}"><p style="color:black;text-align:center;font-size:14px;text-transform:capitalize;line-height:50px">{{ $p->product_name}}</p></a>
				<h3 style="font-weight: 600;font-size: 1em;color: #212121;text-align: center;">${{$p->amount}}</h3>
			</div>

			@endforeach
    		</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!--- products --->

@endsection