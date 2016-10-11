
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
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Schmetterling</h1>
            <p class="lead">  </p>
            <ul class="list-unstyled">
                <li><strong>Make a room unavailable</strong></li>
            </ul>



            {!!  Form::open(array('url' => 'admin/room_availability')) !!}

            {!! Form::select('roomnumber', array(
                         'First Floor' => array('101'=>'101', '102'=>'102', '103'=>'103','104'=>'104','105'=>'105',
                                                   '106'=>'106','107'=>'107','108'=>'108','109'=>'109', '110'=>'110'
                       )))!!}

            {!! Form::input('date', 'startdate', null, [ 'placeholder' => 'Start Date','required'=>'required']) !!}
            {!! Form::input('date', 'enddate', null, [ 'placeholder' => 'End Date','required'=>'required']) !!}
            {!! Form::text('note','',['placeholder'=>'Note']) !!}
            {!!  Form::submit('Submit') !!}
            <br> <br>

            {!! Form::close() !!}

            <table border=3 width=75% cellspacing=5 cellpadding=8 bgcolor=#eff9f9 cols=3 align=center>
                <tr>
                    <td align=center bgcolor=#c0d6e4><b>Room</b></td>
                    <td align=center bgcolor=#c0d6e4><b>From</b></td>
                    <td align=center bgcolor=#c0d6e4><b>To</b></td>
                    <td align=center bgcolor=#c0d6e4><b>Notes</b></td>
                    <td align=center bgcolor=#c0d6e4><b>Action</b></td>
                </tr>




            @foreach($available as $key => $value)
                    <tr>
                    <div style="display: none">{!!  $id =$value->id !!}</div>
                        <td align=center>{{ $value->roomid }}</td>
                        <td align=center>{{ $value->startdate }} </td>
                        <td align=center>{{ $value->enddate }}</td>
                        <td align=center>{{ $value->note }}</td>
                        <td align=center>
                            {!! Form::open(array('url' => 'admin/room_availability/' . $value->id)) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>


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
