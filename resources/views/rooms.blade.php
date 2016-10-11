<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to Project Schmetterling!</title>
<link rel="stylesheet" href="{{URL::asset('/css/homepage/css/booking.css')}}" xmlns="http://www.w3.org/1999/html">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{URL::asset('/css/homepage/css/bootstrap.min.css')}}" xmlns="http://www.w3.org/1999/html">



    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{URL::asset('/css/homepage/css/half-slider.css')}}" xmlns="http://www.w3.org/1999/html">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
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
                <a class="navbar-brand" href="/">
                      {!!  HTML::image('/css/homepage/images/schmetterling2.jpg', 'a picture',array('width'=>'50','height'=>'60','href'=>'/')) !!}
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="/show_rooms">Booking</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<div class="main_bg">
<div class="wrap1">
    <div class="online_reservation">
    <div class="b_room">
        <div class="booking_room">
            <h4>book a room online</h4>

            <p>Thank you for choosing our hotel! Enjoy your stay! We hope to see you again!</p>
        </div>
<form>
 
        <div class="reservation">
            <ul>
                 <li class="span1_of_1 left">
                    <h5>Number of Guests:</h5>
                    
                    <div class="section_room">
                        <select id="guests" onchange="change_country(this.value)" class="frm-field required">
                            <option value="1">1</option>
                            <option value="2">2</option>         
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>                  
                </li>
                <li  class="span1_of_1 left">
                    <h5>check-in-date:</h5>
                    <div class="book_date">
                        
                            <input class="date" id="datepicker" type="date" value="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
                        

                    </div>                  
                </li>
                <li  class="span1_of_1 left">
                    <h5>check-out-date:</h5>
                    <div class="book_date">
                        
                            <input class="date" id="datepicker1" type="date" value="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}">
                       
                    </div>      
                </li>
               
                <li class="span1_of_3">
                    <div class="date_btn">
                        
                            <input type="submit" value="Search" />
                       
                    </div>
                </li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="clear"></div>
        </div>
    </div>
    </form>


    <!-- Heading Row -->
       
        <!-- Footer -->
      

   
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
