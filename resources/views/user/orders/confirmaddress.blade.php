@extends('user.userdashboard')
@section('user')

<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Confirm Order</li>
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

<div class="login" style="padding:1em">
		<div class="container">
			<div class="row">
                <form action="{{ route('saveorderandpay')}}" method="post">
				<div class="col-md-6" style="padding:20px">
					<div class="login-form-grids" style="width:100%;margin:0px">
						<h5>profile information</h5>
						
							@csrf	
							<input type="text" name="first_name" placeholder="First Name..." style="color:black" value="{{ $user->first_name}}" required=" " >
							<input type="text" name="last_name"  placeholder="Last Name..." required=" " style="color:black" value="{{ $user->last_name}}" >
							<br/>
							<input type="text" name="mobile_number" placeholder="Mobile No...." required=" " style="color:black" value="{{ $user->mobile_number}}" >
							<br/>
                            <input type="text" name="address"  required=" " style="color:black"  value="{{ trim($user->address)}}" >
							<br/>
                            Shipping Address
                            <textarea type="text" class="form-control"name="billing_address"placeholder="Billing Address" required=" " style="color:black" >
                            </textarea>
							<br/>
                            <input type="text" name="city" required=" " placeholder="City" style="color:black" >
							<br/>
                            <input type="text" name="pincode" required=" " placeholder="Pincode" style="color:black" >
							<br/>
                            <h3>Want Local Pickup from Store</h3><br/>
                            <input type="radio" name="local_pickup" required=" " value="1"><span style="font-size:18px">Yes</span>
                            <input type="radio" name="local_pickup" required=" " value="0" checked="checked" ><span style="font-size:18px">No</span>
							<br/>
                            
						
					</div>					
				</div>
				<div class="col-md-6" style="padding:20px">
					<h3>Final Product Confirmation</h3>
                    @php $total = 0; $i=1; @endphp
                    @if(session('cartdetail'))
                        @foreach(session('cartdetail') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <div class="row border border-black" style="padding:50px; 0px" >
                                <div class="col-md-2" style="line-height:100px; ">
                                    {{ $i }} @php $i++; @endphp
                                </div>
                                <div class="col-md-3" style="line-height:100px; ">
                                    {{ $details['name'] }}
                                </div>
                                <div class="col-md-3" style="line-height:100px; ">
                                    <img src="{{ URL::to('/')}}/productpics/{{ $details['image']}}"
                                    class="img img-responsive" style="height:100px;width:100px"/>
                                </div>
                                <div class="col-md-2" style="line-height:100px;">
                                    ${{ $details['price'] }}
                                </div>
                                <div class="col-md-2" style="line-height:100px;">
                                    <strong>${{ $details['price'] * $details['quantity'] }}</strong>
                                </div>                                
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <br/>
                            <h3><strong>Total ${{ $total }}</strong></h3>  
                            <br/>
                            <img src="{{ asset('dist/images/payment.png') }}" class="img-responsive"/> 
                            {{-- <a href="{{ route('make.payment') }}" class="btn btn-info btn-block" style="margin:10px 0px;padding:10px"> --}}
                            <button  class="btn btn-info btn-block" style="margin:10px 0px;padding:10px">
                                <h3>Pay Via <strong>${{ $total }}</strong> Paypal</h3>
                            </button>
                            {{-- </a > --}}
                        </div>
                    </div>
					
				</div>
            </form>
			</div>
		</div>
</div>
<!-- //login -->

@endsection
