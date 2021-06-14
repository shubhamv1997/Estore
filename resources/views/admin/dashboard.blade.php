
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('dist/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.css')}}" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="{{asset('dist/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons CSS-->
    <!-- side nav css file -->
    <link href="{{asset('dist/css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css' />
    <!-- //side nav css file -->
    <!-- js-->
    <script src="{{asset('dist/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('dist/js/modernizr.custom.js')}}"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->
    <!-- Metis Menu -->
    <script src="{{asset('dist/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <link href="{{asset('dist/css/custom.css')}}" rel="stylesheet">
    <!--//Metis Menu -->
    <style>
        #chartdiv {
            width: 100%;
            height: 295px;
        }
    </style>



</head>
<body class="cbp-spmenu-push">
    <div class="main-content">
        <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <!--left-fixed -navigation-->
            <aside class="sidebar-left">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="navbar-brand" href="index.html"> E-Commerce<span class="dashboard_text">Shopping Site</span></a></h1>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="sidebar-menu">
                            <li class="header">MAIN NAVIGATION</li>
                            <li class="treeview">
                                <a href="{{ route('home')}}">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>



                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-edit"></i> <span>Category</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="{{ route('catcreate')}}"><i class="fa fa-angle-right"></i> Add Category</a></li>
                                    <li><a href=""><i class="fa fa-angle-right"></i> Manage Category</a></li>

                                </ul>
                            </li>
                           
                            <li class="treeview">
                                <a href="">
                                <i class="fa fa-table"></i>
                                <span>Approve Retailer</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="">
                                <i class="fa fa-table"></i>
                                <span>Approve Products</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="">
                                <i class="fa fa-table"></i>
                                <span>Promote Retailer</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="">
                                <i class="fa fa-table"></i>
                                <span>All Order</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="">
                                <i class="fa fa-table"></i>
                                <span>Show Dispute</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="">
                                <i class="fa fa-table"></i>
                                <span>Show Feedback</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="">
                                <i class="fa fa-table"></i>
                                <span>Change Retailer Status</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </aside>
        </div>
        <!--left-fixed -navigation-->
        <!-- header-starts -->
        <div class="sticky-header header-section ">

        <div class="header-left">
        <h1 class="text-center">Welcome To Admin Panel</h1>

        </div>
        

            <div class="header-right">

           

                <div class="profile_details">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img"><img src="{{asset('dist/images/2.jpg')}}" alt=""> </span>
                                    <div class="user-name">
                                        <p>{{Auth::user()->name}}</p>
                                        <span>{{Auth::user()->email}}</span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">

                                <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
                                <li> <a href="#"><i class="fa fa-suitcase"></i> Change Password</a> </li>
                                <li>
                                <a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //header-ends -->
        <!-- main content start-->


        @yield('admin')
        <!--footer-->
        <div class="footer">
            <p>&copy; 2021 E-Commerce. All Rights Reserved | Developed by Us</p>
        </div>
        <!--//footer-->
    </div>


    <!--scrolling js-->
    <script src="{{asset('dist/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('dist/js/scripts.js')}}"></script>
    <!--//scrolling js-->
    <!-- side nav js -->
    <script src="{{asset('dist/js/SidebarNav.min.js')}}" type='text/javascript'></script>
    <script>
      $('.sidebar-menu').SidebarNav()
    </script>
    <!-- //side nav js -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('dist/js/bootstrap.js')}}"></script>
    <!-- //Bootstrap Core JavaScript -->

</body>
</html>
