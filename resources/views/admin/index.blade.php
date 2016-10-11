landing admin

<div id="error_message">
    @if(Session::has('alert'))
        <p class="alert alert-success">{{ Session::get('alert') }}</p>
    @endif
</div>

<ul>
	<li><a href="/admin/room_availability">room availability</a></li>
	<li><a href="/admin/guestroomnumber">show room number of guest</a></li>
	<li><a href="/admin/currentguests">current guests</a></li>
	<li><a href="/admin/auth">current logged in user (for debugging)</a></li>
	<li><a href="/admin/logout">logout</a></li>
</ul>