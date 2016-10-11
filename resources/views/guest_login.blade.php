@extends('layouts.master')

@section('title', 'Guest Login')

@section('content')

<div class="container">
	<div class="main guestlogin">

		<div id="error_message">
            @if(Session::has('alert'))
                <p class="alert alert-warning">{{ Session::get('alert') }}</p>
            @endif
        </div>

		<form action="guest_login" method="post">
			<label for="name">Guest Name:</label>
		    <input type="text" name="name" id="name" value=""><br>
		    <label for="credentials"> Credentials:</label>
		    <input type="text" name="credentials" id="credentials" value=""><br>
		 	<button class="btn">
				  <p>Submit</p>
				  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
				    <path id="paper-plane-icon" d="M462,54.955L355.371,437.187l-135.92-128.842L353.388,167l-179.53,124.074L50,260.973L462,54.955z
				M202.992,332.528v124.517l58.738-67.927L202.992,332.528z"></path> 
				  </svg>
			</button>
		</form>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	    <script src="index.js"></script>

	  	<div onmouseover="mOver(this)" onmouseout="mOut(this)" id="bb">
				Thank you for choosing our hotel!</div>

		<script type="text/javascript">
		function mOver(obj) {
			
		    obj.innerHTML = " We hope to see you again  :)"
		   
		}

		function mOut(obj) {
		    obj.innerHTML = " Have a nice day! :)"
		}
		</script>

	</div>
</div>

@endsection
