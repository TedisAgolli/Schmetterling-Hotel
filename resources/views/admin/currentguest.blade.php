<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manager Portal</title>

    <!-- Bootstrap Core CSS -->


    <link rel="stylesheet" href="{{URL::asset('/css/bootstrap.min.css')}}" xmlns="http://www.w3.org/1999/html">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }

        #navigation_bar{
            color:white;
            position:relative;
            top:25px;
            left:2%;
            margin-right: 20px;
            font-size: 18px;
        }

    </style>



</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

        {!! HTML::link('admin/room_availability','Room Availability',array("id"=>"navigation_bar"))  !!}
        {!! HTML::link('admin/guestroomnumber','Room Information',array("id"=>"navigation_bar"))  !!}
        {!! HTML::link('admin/currentguests','Current Guests',array("id"=>"navigation_bar"))  !!}

        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
         <h1>Schmetterling</h1>
            <p class="lead">  </p>
            <ul class="list-unstyled">
                <li><strong>Show current guests</strong></li>
            </ul>


<table border=3 width=75% cellspacing=5 cellpadding=8 bgcolor=#eff9f9 cols=5 align=center>
    <tr>
        <td align=center bgcolor=#c0d6e4><b>Guest ID</b></td>
        <td align=center bgcolor=#c0d6e4><b>Guest Name</b></td>
        <td align=center bgcolor=#c0d6e4><b>Adults</b></td>
        <td align=center bgcolor=#c0d6e4><b>Checkin-Time</b></td>
        <td align=center bgcolor=#c0d6e4><b>Checkout-Time</b></td>
        <td align=center bgcolor=#c0d6e4><b>Days of stay</b></td>
        <td align=center bgcolor=#c0d6e4><b>Room number</b></td>
    </tr>

@foreach($reservations as $key => $value)
    <tr>
        <td align=center>{{ $value->guestid }}</td>
        <td align=center>{{ $value->firstname }} {{ $value->lastname }}</td>
        <td align=center>{{ $value->adults }}</td>
        <td align=center>{{ $value->checkin }}</td>
        <td align=center>{{ $value->checkout }}</td>
        <td align=center>
            <?php 

                // $datetime1 = date_create($value->checkin);
                // $datetime2 = date_create($value->checkout);
                // $interval = date_diff($datetime1, $datetime2);
                // echo $interval->format('%a days');
                $nights = floor((strtotime($value->checkout) - strtotime($value->checkin)) / 86400 +1);
                echo $nights;
            ?>
        </td>
        <td align=center>{{ $value->roomnumber }}</td>
    </tr>
@endforeach

</table>
</center>
            </div>
        </div>
        <!-- /.row -->

    </div>



</body>

</html>
