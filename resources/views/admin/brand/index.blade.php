@extends('admin.dashboard')
@section('admin')

<!--start Table Here-->
<div id="page-wrapper">
			<div class="main-page" >
				<div class="tables">
					<h2 class="title1">Brand</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Show Brand Data:</h4>
                        @if(session()->get('Success'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done! Data Deleted</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

						<table class="table table-bordered">
                             <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Brand Name</th> 
                                    <th>Edit</th>
                                    <th>Delete</th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                            @if(count($brands) >= 1 )
                                @foreach ($brands as $b)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->brand_name }}</td>
                                <td><a href="{{ route('brandedit',$b->id)}}" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a></i></td>
                                <td>
                                <form action="{{ route('branddestroy',$b->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button class="fa fa-times text-danger text btn btn-outline-danger"type="submit"></button>
                                </form>
                                </td>
                                </tr>
                                @endforeach
                             </tbody>
                         </table> 
                         @else
                         <tr>
                                <td colspan="5">No Data Found</td>
                         </tr>
                            
                        @endif
					</div>
				</div>
			</div>
		</div>


@endsection