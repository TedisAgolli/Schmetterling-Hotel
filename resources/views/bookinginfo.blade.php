@extends('layouts.master')

@section('title', 'General Information')

@section('content')
<div class="container">
    <ul>
        <li>Checkin: {{ $checkin }}</li>
        <li>Checkout: {{ $checkout }}</li>
        <li>Guest: {{ $guests }}</li>
        <li>Room-ID: {{ $roomid }}</li>
        <li>Total Price: {{ $total }}</li>
        <li>priceid: {{ $priceid }}</li>
    </ul>

    <form action="sendbooking" method="POST">
        <div class="row">
            <div class="col-sm-6">
                <h2>Personal Information</h2>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" required="required">
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required="required">
                </div>
                <div class="form-group">
                    <label for="notes">Notes to the Hotel</label>
                    <textarea class="form-control" id="notes" name="note" rows="3" required="required"></textarea>
                </div>
            </div>
        
            <div class="col-sm-6">
                <h2>Payment Information Information</h2>
                <div class="form-group">
                    <label>Card Type</label>
                    <div class="radio">
                        <label>
                        <input type="radio" name="cardtype" value="mastercard" checked>
                        Mastercard
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="cardtype" value="visa">
                        Visa
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cardnumber">Cardnumber</label>
                    <input type="text" class="form-control" id="cardnumber" name="cardnumber" required="required">
                </div>
                <div class="form-group">
                    <label for="expirationdate">Expiration Date</label>
                    <input type="date" class="form-control" id="expirationdate" name="expirationdate" required="required">
                </div>
            </div>
        </div> 
        
        <input type="hidden" name="checkin" value="{{$checkin}}"> 
        <input type="hidden" name="checkout" value="{{$checkout}}"> 
        <input type="hidden" name="guests" value="{{$guests}}"> 
        <input type="hidden" name="roomid" value="{{$roomid}}"> 
        <input type="hidden" name="total" value="{{$total}}"> 
        <input type="hidden" name="priceid" value="{{$priceid}}"> 

        <button type="submit" class="btn btn-default">Submit</button>
    </form> 
</div>

@endsection
