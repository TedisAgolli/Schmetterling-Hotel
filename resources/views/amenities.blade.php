
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

@extends('layouts.master')

@section('title', 'Amenities')



@section('content')

<style>
#amen1{
    left: 300px ;
    top: 200px;
    float: left;
}
#amen2{
    left: 700px ;
    top: 200px;
    float: center;
}
#amen3{
    left: 1100px ;
    top: 200px;
    float: right;
}

.slider{
    position: relative;
    margin-top: 40%;
    left: 2%;
}

</style>
</head>
<body>   



    <div id="amen1">
        <h3>Room Features</h3>
        <ul>
            <li>Air-conditioned room</li>
            <li>Internet/Free WiFi</li>
            <li>City View Rooms</li>
            <li>Sitting Area</li>
            <li>Tv Facilities</li>
            <li>Wake-up service</li>
            <li>Daily Housekeeping</li>
        </ul>
    </div>

    <div id="amen2">
        <h3>Entertainment</h3>
        <ul>
            <li>Swimming Pool</li>
            <li>Minibar</li>
            <li>Restaurant</li>
            <li>Beauty services</li>
            <li>Sauna</li>
            <li>Fitness Center</li>
        </ul>
    </div>

    <div >

        <ul id="amen3" >
            <h3 >Other</h3>
            <li>Free Parking</li>
            <li>24 hours Front Dest Service</li>
            <li>Complimentary Breakfast</li>
            <li>Coffee/Tea in Lobby</li>
        </ul>

    </div>



    <div class="slider">
        <div id="img">{!!  HTML::image('/css/amenities/images/amen1.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen3.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen4.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen5.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen6.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen7.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen8.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen9.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen10.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen11.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen12.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen13.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen14.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen15.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen16.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen17.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen18.jpg', 'a picture') !!}</div>
        <div id="img">{!!  HTML::image('/css/amenities/images/amen19.jpg', 'a picture') !!}</div>

    </div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {!!  HTML::script('/css/amenities/slick.min.js')  !!}

    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                dots:true,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3, centerMode:true
            });
        });
    </script>



    {!! HTML::link('/booking','Book Now',array("class"=>"book"))  !!}



@endsection

</body>



