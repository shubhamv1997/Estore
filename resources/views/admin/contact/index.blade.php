@extends('admin.dashboard')
@section('admin')

<!--start Table Here-->
<div id="page-wrapper">
			<div class="main-page" >
				<div class="tables">
					<h2 class="title1">Show Message</h2>
					
					
					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Show Message Data:</h4>
                        @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

						<table class="table table-bordered">
                             <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr> 
                            </thead> 
                            <tbody> 
                            @if(count($contacts) >= 1 )
                                @foreach ($contacts as $c)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->name}}</td>
                                <td>{{ $c->email}}</td>
                                <td>{{ $c->message}}</td>
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