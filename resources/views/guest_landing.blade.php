@extends('layouts.master')

@section('title', 'Guest Login')

@section('content')

<h1>Hello {{ $username[0]->firstname }} {{ $username[0]->lastname }} </h1>

<div id="error_message">
@if(Session::has('alert'))
    <p class="alert alert-success">{{ Session::get('alert') }}</p>
@endif
</div>

<h2>Your Upcomming Bookings</h2>
<p>We are looking forward seeing you.</p>

<div class="container">
	<table class="table table-striped">
		<tr>
			<th>checkin</th>
			<th>checkout</th>
			<th>roomnumber</th>
			<th>price</th>
			<th>action</th>
		</tr>

		@foreach($reservations as $key => $value)
		<tr>
			<td>{{ $value->checkin }}</td>
			<td>{{ $value->checkout }}</td>
			<td>{{ $value->roomnumber }}</td>
			<td>{{ $value->currentprice }}</td>
			<td>
				<a href="/guest_landing?cancelbooking={{ $value->reservationid }}" class="btn btn-danger btn-sm">Cancel Booking</a>
           	</td>
		</tr>
		@endforeach
	</table>
</div>

@endsection
