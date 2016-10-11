<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {n
    return view('welcome');

}); */

Route::post('show_rooms','GuestController@showRooms');
Route::post('bookinginfo','GuestController@bookinginfo');
Route::get('search','GuestController@search');
Route::get('guest_login','GuestController@login');
Route::post('guest_login','GuestController@loginauth');
Route::get('guest_landing','GuestController@guestLandingPage');
Route::post('sendbooking','GuestController@sendbooking');
Route::get('contact', function ()    {
    return view('under_construction');
});



Route::resource('admin/room_availability', 'RoomAvailabilityController');
Route::controller('admin', 'ManagerController');
Route::get('guest_login','GuestController@login');

Route::controller('/','PageController');
