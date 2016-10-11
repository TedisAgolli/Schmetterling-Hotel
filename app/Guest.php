<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use DB;

class Guest extends Model
{
	protected $table = 'guest';

    protected $fillable = array('firstname', 'lastname');

	public function reservation() {
        return $this->belongsTo('App\Reservation');
    }

    public static function current()
    {
    	$now = Carbon\Carbon::now();

        $reservations = DB::table('reservation')
            ->where('reservation.checkin', '<=', $now)
            ->where('reservation.checkout', '>=', $now)
            ->join('guest', 'guest.id', '=', 'reservation.guestid')
            ->join('room_reservation', 'reservation.id', '=', 'room_reservation.reservationid')
            ->join('room', 'room.id', '=', 'room_reservation.roomid')
            ->select('reservation.*', 'guest.firstname', 'guest.lastname', 'room.roomnumber' )
            ->get();

        return $reservations;
    }

    public static function allReservations($userid)
    {
        $reservations = DB::table('reservation')
            ->where('reservation.guestid', '=', $userid)
            ->join('room_reservation', 'reservation.id', '=', 'room_reservation.reservationid')
            ->join('room', 'room.id', '=', 'room_reservation.roomid')
            ->join('order', 'reservation.id', '=', 'order.reservationid')
            ->get();

        return $reservations;
    }

    public static function allUpcommingReservations($userid)
    {
        $now = Carbon\Carbon::now();

        $reservations = DB::table('reservation')
            ->where('reservation.guestid', '=', $userid)
            ->where('checkin', '>', $now)
            ->join('room_reservation', 'reservation.id', '=', 'room_reservation.reservationid')
            ->join('room', 'room.id', '=', 'room_reservation.roomid')
            ->join('order', 'reservation.id', '=', 'order.reservationid')
            ->get();

        return $reservations;
    }

    public static function cancelReservation($reservationid)
    {
        // delete room_reservation relation
        $room_reservation = DB::table('room_reservation')
            ->where('reservationid', $reservationid)
            ->delete();

        // delete order
        $order = DB::table('order')
            ->where('reservationid', $reservationid)
            ->delete();

        // delete reservation
        Reservation::destroy($reservationid);
    }
}
