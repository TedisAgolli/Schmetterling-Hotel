<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    protected $table = 'room_reservation';

	protected $fillable = array('roomid', 'reservationid');
}
