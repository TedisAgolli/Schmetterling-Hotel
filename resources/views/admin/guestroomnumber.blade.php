
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
    #search{ position: relative; left: 38%; margin-left: 2%; margin-top:2%;}
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
<label id="search" for="search">Filter Guests: </label><input type="text" id="search">
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
</nav>
</br></br></br></br>
<table border=3 width=75% cellspacing=5 cellpadding=8 bgcolor=#eff9f9 cols=5 align=center> 
    <tr>
        <td align=center bgcolor=#c0d6e4><b>Guest Name</b></td>
        <td align=center bgcolor=#c0d6e4><b>Checkin-Time</b></td>
        <td align=center bgcolor=#c0d6e4><b>Checkout-Time</b></td>
        <td align=center bgcolor=#c0d6e4><b>Room number</b></td>
    </tr>

@foreach($reservations as $key => $value)
    <tr class="reservation">
        <td class="name">{{ $value->firstname }} {{ $value->lastname }}</td>
        <td class="checkin">{{ $value->checkin }}</td>
        <td class="checkout">{{ $value->checkout }}</td>
        <td>{{ $value->roomnumber }}</td>
    </tr>
@endforeach

</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">
    $('input').on('input', function() {
        var inputval = $(this).val().toLowerCase();

        $('tr.reservation').each(function() {
            var txt = $(this).text();

            if (txt.toLowerCase().indexOf(inputval) < 0) {
                $(this).hide();
            } else {
                $(this).show();
            }

        });
    });
</script>
</body>