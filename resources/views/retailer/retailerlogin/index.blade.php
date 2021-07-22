
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Retailer Login </title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content=" Marvel Sign In Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates,
      Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"/>
    <script>
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="{{ asset('vendor_template/login_temp/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="{{ asset('retailertemplate/login_temp/css/style.css')}}" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
  </head>
  <body>
    <div class="back-image bg bg1">
      <h1 class="header-w3ls ">
        Retailer Sign In Form
      </h1>
       @if(session()->get('error'))
                       <div class="alert alert-primary alert-dismissible">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i>  {{ session()->get('error') }}</h4>
                      
                       </div>
                         @endif
      <div class="main ">
        <div class="headder-icon">
          <div class="top-icon ">
            <span class="fa fa-angle-double-down" aria-hidden="true"></span>
          </div>
        </div>
        <div class="its-sign-in">
          <h2 class="">Sign in Here</h2>
        </div>
        <form action="{{ route('login') }}" method="post">
        	@csrf
          <div class="form-left-w3l ">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                 </span>
            @enderror
          </div>
          <div class="form-left-w3l ">
             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <input type="hidden" value="Retailer" name="type"/>
       
          <div class="btnn">
            <button type="submit" class="btn">Sign in</button><br>
            <div class="clear"></div>
          </div>
        </form>
        
        
      </div>
      <div class="copy">
        <p>&copy;2021 Retailer Sign In Form. All Rights Reserved | Developed by Students
          
        </p>
      </div>
    </div>
  </body>
</html>