
@extends('layouts.master')

@section('title', 'Available Rooms')

@section('content')

<div class="container">
    <ul>
        <li><h4>Checkin: {{ $checkin }}</h4></li>
        <li><h4>Checkout: {{ $checkout }}</h4></li>
        <li><h4>Guest: {{ $guests }}</h4></li>
    </ul>
</br>
    <table class="table table-striped" >
        <tr>
            <th><b>Capacity</b></th>
            <th><b>Room Number</b></th>
            <th><b>Price</b></th>
            <th><b>Number of Nights</b></th>
            <th><b>Total</b></th>
            <th><b>Description</b></th>
            <th><b>Action</b></th>
        </tr>

        @foreach($rooms as $key => $value)
        <tr>
            <td>{{ $value->capacity}}</td>
            <td>{{ $value->roomnumber }}</td>
            <td>${{ $value->value }}</td>
            <td><?php echo $nights=floor((strtotime($checkout) - strtotime($checkin))  / 86400); ?></td>
            <td>$<?php echo $total = $value->value * $nights;?></td>
             <td>{{ $value->description}}</td>
            <td>
                {!! Form::open(array('url' => 'bookinginfo')) !!}
                    <input type="hidden" name="roomid" value="{{$value->id}}"> 
                    <input type="hidden" name="priceid" value="{{$value->priceid}}"> 
                    <input type="hidden" name="total" value="{{$total}}"> 
                    {!! Form::submit('Choose room', array('class' => 'btn btn-sm')) !!}
                {!! Form::close() !!}
            </td>
           
        </tr>
        @endforeach
    </table>
</div>
 

@endsection
