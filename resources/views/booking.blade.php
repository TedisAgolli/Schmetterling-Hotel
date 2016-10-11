@extends('layouts.master')

<title>Booking</title>


@section('content')
<div class="wrap1">
    <div class="online_reservation">
    <div class="b_room">
        <div class="booking_room">
            <h4>book a room online</h4>

            <p>Thank you for choosing our hotel! Enjoy your stay! We hope to see you again!</p>
        </div>

  {!!  Form::open(array('url' => '/show_rooms')) !!}

        <div class="reservation">
            <ul>
                 <li class="span1_of_1 left">
                    <h5>Number of Guests:</h5>
                    
                    <div class="section_room">

                    	{!!Form::select('guests', array('1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7'))!!}

                    </div>                  
                </li>
                <li  class="span1_of_1 left">
                    <h5>check-in-date:</h5>
                    <div class="book_date">


                         {!! Form::input('date', 'checkin', null, [ 'placeholder' => 'Start Date','required'=>'required']) !!}

                    </div>                  
                </li>
                <li  class="span1_of_1 left">
                    <h5>check-out-date:</h5>
                    <div class="book_date">
                        
                            {!! Form::input('date', 'checkout', null, [ 'placeholder' => 'Start Date','required'=>'required']) !!}
                       
                    </div>      
                </li>
               
                <li class="span1_of_3">
                    <div class="date_btn">
                        
                           {!! Form::submit('Search', array('name' => 'submit')) !!}
                       
                    </div>
                </li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="clear"></div>
        </div>
    </div>
    {!!Form::token() !!}
  {!!Form::close()!!}

@endsection
