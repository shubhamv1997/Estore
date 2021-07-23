@extends('retailer.rdashboard')

@section('retailer')
<!-- main content start-->



<div id="page-wrapper">
            <div class="main-page">
                <div class="col_3">
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-dollar icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No.of Category</strong></h5>
                                <span>{{ $category}}</span>

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Subcategory</strong></h5>
                                <span>{{ $subcategory}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-money user2 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Products</strong></h5>
                                <span>{{ $product }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. Of Users</strong></h5>
                                <span>{{ $register }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Orders</strong></h5>
                                <span>{{ $order }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>



                </br>
                <div class="col_3">
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-dollar icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No.of Countries</strong></h5>
                                <span>{{ $country }}</span>

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Cities</strong></h5>
                                <span>{{ $city }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-money user2 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Retailers</strong></h5>
                                <span>{{ $retailer}} </span>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. Of Users</strong></h5>
                                <span>Total Users</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Orders</strong></h5>
                                <span>Total Orders</span>
                            </div>
                        </div>
                    </div>-->
                    <div class="clearfix"> </div>
                </div>


                <div class="row-one widgettable">
                    <div class="clearfix"> </div>
                </div>




                <script src="{{asset('dist/js/index1.js')}}"></script>

                
            </div>
        </div>

@endsection
