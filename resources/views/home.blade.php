@extends('admin.dashboard')

@section('admin')
<!-- main content start-->



<div id="page-wrapper">
            <div class="main-page">
                <div class="col_3">
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-dollar icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No.of Category</strong></h5>
                                <span>Total Category</span>

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Retailer</strong></h5>
                                <span>Total Retailer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
                        <div class="r3_counter_box">
                            <i class="pull-left fa fa-money user2 icon-rounded"></i>
                            <div class="stats">
                                <h5><strong>No. of Products</strong></h5>
                                <span>Total Products</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 widget widget1">
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
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="row-one widgettable">
                    <div class="clearfix"> </div>
                </div>



                

                <script src="{{asset('dist/js/index1.js')}}"></script>

                <div class="charts">
                    <div class="mid-content-top charts-grids">
                        <div class="middle-content">
                            <h4 class="title">Show Order</h4>
                            <table class="table table-bordered"> <thead> <tr> <th>#</th> <th>Cutomer Name</th> <th>Date of Order</th> <th>Product Name</th> <th>Price</th> <th>Status</th> <th>Quantity</th> </tr> </thead> <tbody> <tr> <th scope="row">1</th> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> </tr> <tr> <th scope="row">2</th> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> </tr> <tr> <th scope="row">3</th> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> <td>Table cell</td> </tr> </tbody> </table>

                        </div>
                        <!--//sreen-gallery-cursual---->
                    </div>
                </div>

            </div>
        </div>

@endsection
