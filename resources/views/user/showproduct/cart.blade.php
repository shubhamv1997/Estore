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
<table id="cart" class="table table-hover table-condensed">

    <thead>

        <tr>

            <th style="width:50%">Product</th>

            <th style="width:10%">Price</th>

            <th style="width:8%">Quantity</th>

            <th style="width:22%" class="text-center">Subtotal</th>

            <th style="width:10%"></th>

        </tr>

    </thead>

    <tbody>

        @php $total = 0 @endphp
        @if(session('cartdetail'))
            @foreach(session('cartdetail') as $id => $details)

                @php $total += $details['price'] * $details['quantity'] @endphp

                <tr data-id="{{ $id }}">

                    <td data-th="Product">

                        <div class="row">

                            <div class="col-sm-3 hidden-xs">
                            <img src="" alt=" " class="img-responsive"/>
			
                            </div>

                            <div class="col-sm-6">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                            <div class="col-sm-3">

                                <img src="{{ URL::to('/')}}/productpics/{{ $details['image']}}"
                                class="img img-responsive"/>
                            </div>  
                        </div>

                    </td>

                    <td data-th="Price">${{ $details['price'] }}</td>

                    <td data-th="Quantity">
                        <form action="{{url('updateCart')}}" method="post">
                            @csrf
                            <input type="number" name="qty"
                             value="{{ $details['quantity'] }}" 
                             class="form-control" />
                             <input type="hidden" name="id" value="{{$id}}"/>
                            <input type="submit"class="btn btn-info btn-sm " value="Update" />

                        </form>
                    </td>

                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>

                    <td class="actions" data-th="">

                        <a href="{{ route('removefromcart',$id)}}" class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></a>

                    </td>

                </tr>

            @endforeach

        @endif

    </tbody>

    <tfoot>

        <tr>

            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>

        </tr>

        <tr>

            <td colspan="5" class="text-right">

                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>

                <button class="btn btn-success">Checkout</button>

            </td>

        </tr>

    </tfoot>

</table>
<div class="container-fluid">
    <div class="row">
        <div class="col-12"><h3 class="text-center text-info">Product You May like</h3><br/></div>        
        <div class="clearfix"></div>
        
        <div class="col-md-12" style="padding-left:5% !important" >
        @foreach($product as $p)
			
			<div class="col-md-3" style="width:23% !important;margin:2px;border:1px solid grey">

			<img src="{{ URL::to('/')}}/productpics/{{ $p->image_1}}" alt=" " class="img-responsive img" style="height:200px;width:100%"/>
				<a href="{{ route('showdetails',$p->id)}}"><p style="color:black;text-align:center;font-size:14px;text-transform:capitalize;line-height:50px">{{ $p->product_name}}</p></a>
				<h3 style="font-weight: 600;font-size: 1em;color: #212121;text-align: center;">${{$p->amount}}</h3>
			    <a href="{{ route('addtocart', $p->id) }}" class="btn btn-info btn-block text-center" style="margin-bottom:10px" role="button">Add to cart</a> 

			</div>

        @endforeach

</div>
    </div>
</div>
@endsection

  

@section('scripts')


@endsection