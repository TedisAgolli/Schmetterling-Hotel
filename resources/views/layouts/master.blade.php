<html>
    <head>
	
	<meta charset="utf-8" /> <!--The charset attribute specifies the character encoding for the HTML document.-->
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{URL::asset('/css/amenities/slick.css')}}" xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('/css/amenities/slick-theme.css')}}" xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('/css/amenities/style.css')}}" xmlns="http://www.w3.org/1999/html">
    <link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">
	
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 
    <link rel="stylesheet" href="{{URL::asset('/css/homepage/css/booking.css')}}" xmlns="http://www.w3.org/1999/html">
  
    <link rel="stylesheet" href="{{URL::asset('/css/guest/guest.css')}}" xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('/css/guest/reset.css')}}" xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('/css/guest/style.css')}}" xmlns="http://www.w3.org/1999/html">
    
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>


	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
	<script> 
	$(document).ready(function() { 
	$("#datepicker,#datepicker1").datepicker(); }); 
	</script> 
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to Project Schmetterling!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/half-slider.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
      
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index">
                    <img src="img/schmetterling2.jpg" href="index" width="50" height="60" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="booking">Booking</a>
                    </li>
					<li>
                        <a href="amenities">Amenities</a>
                    </li>
                    <li>
                        <a href="guest_login">User Login</a>
                    </li>
                    <li>
                        <a href="contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>