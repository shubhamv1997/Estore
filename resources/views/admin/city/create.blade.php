@extends('admin.dashboard')
@section('admin')

<!-- main content start-->
<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1">City</h2>
					
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add City Form :</h4>
							</div>
                            @if(session()->get('Done'))
                            <div class="alert alert-success" role="alert">
                                <strong><i class="icon fa fa-check"></i>Well done!</strong> {{ session()->get('Done') }}
                            </div>
                            @endif

							<div class="form-body">
								<form action="{{ route('citystore')}}" class="form-horizontal" method="post"> 
                                @csrf
                             
                            
                             <div class="form-group"> 
                                <label for="inputPassword3" class="col-sm-2 control-label">Select Country</label> 
                                    <div class="col-sm-9">
                                        <select name="country_id" id="country_id" class="form-control">
                                            <option selected="" disabled="">--------Select Country----</option>
                                            @foreach($countries as $c)
                                                <option value="{{ $c->id }}">{{ $c->country_name }}</option>
                                            @endforeach
                                        </select>

                                        @foreach($errors->get('country_id') as $error)
                                            <span class="help-block" style="color:red;">{{ $error }}</span>
                                        @endforeach
                                      
                                    </div>
                             </div>

                             <div class="form-group"> 
                                    <label for="inputEmail3" class="col-sm-2 control-label">City Name</label>
                                     <div class="col-sm-9"> 
                                       <input type="text" class="form-control" id="city_name" name="city_name" placeholder="City Name"> 
                                    
                                       @foreach($errors->get('city_name') as $error)
                                            <span class="help-block" style="color:red;">{{ $error }}</span>
                                        @endforeach 
                                    </div> 
                                </div>
                              
                             <div class="form-group"> 
                               <div class="col-sm-offset-2"> 
                                    <button type="submit" class="btn btn-default">Add City</button> 
                                </div> 
                            </div>
                             </form> 
							</div>
						</div>
					</div>
				
					
					</div>
			</div>
		</div>





@endsection