@extends('user.userdashboard')
@section('user')

<!-- //breadcrumbs -->


<div class="products">
		<div class="container">
			<div class="agileinfo_single">
                @foreach($product1 as $p1)
			
				<div class="col-md-4 ">
					<img id="example" src="{{ URL::to('/')}}/productpics/{{ $p1->image_1}}" alt=" " class="img-responsive">
               

                     <!----new 3 divs---->
                <div class="row" style="margin-top:50px;">

                    <div class="col-md-4"><img id="example" src="{{ URL::to('/')}}/productpics/{{ $p1->image_3}}" alt=" " class="img-responsive">
               </div>
                    <div class="col-md-4"><img id="example" src="{{ URL::to('/')}}/productpics/{{ $p1->image_2}}" alt=" " class="img-responsive">
               </div>
                    <div class="col-md-4"><img id="example" src="{{ URL::to('/')}}/productpics/{{ $p1->image_1}}" alt=" " class="img-responsive">
               </div>
                </div>
<!---end new 3 divs----->

                </div>


                @endforeach
				<div class="col-md-8 agileinfo_single_right">
                @foreach($product as $p)
			
				<h2>{{ $p->product_name}}</h2>
					<div class="rating1">
						<!--<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>--->
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{ $p->description}}</p>
					</div>

                    
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">Price: ${{$p->amount}}</h4>
						</div>
						<div class="w3agile_description">
						<h4>Specification :</h4>
						<p>{{ $p->specification}}</p>
						</div>
					</div>
                    @endforeach

                    @foreach($product2 as $p2)
			
                    <div class="w3agile_description">
						<h4>Attributes :</h4>
						<p>{{ $p2->att_name1}}: {{ $p2->att_value1}}</p>
						<p>{{ $p2->att_name2}}: {{ $p2->att_value2}}</p>
					</div>

                    @endforeach



				</div>

               
               
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>


@endsection