<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
use DB;

class Room extends Model
{
    protected $table = 'room';

    public static function available($checkin, $checkout, $countguest)
    {
    	// get all unavailable rooms
    	$unavailablerooms = Room::unavailableDuring($checkin, $checkout);
    	// extract array of room ids that are not available
		$unavailableroomids = array();
        foreach ($unavailablerooms as $index => $value) {
        	array_push($unavailableroomids, $unavailablerooms[$index]->roomid);
        }

        // get all reserved rooms
    	$reservedrooms = Room::reservedDuring($checkin, $checkout);
    	// extract array of room ids that are not available
		$reservedroomids = array();
        foreach ($reservedrooms as $index => $value) {
        	array_push($reservedroomids, $reservedrooms[$index]->roomid);
        }

        // query rooms 
    	$rooms = DB::table('room')
    		->where('room.capacity', '>=', $countguest)
    		->whereNotIn('room.id', $unavailableroomids)
    		->whereNotIn('room.id', $reservedroomids)
    		->join('room_price', 'room_price.roomid', '=', 'room.id')
    		->join('price', 'room_price.priceid', '=', 'price.id')
    		->select('room.*', 'price.value', 'room_price.priceid')
    		->orderby('room.roomnumber')
    		->get();

        return $rooms;
    }

    public static function reservedDuring($checkin, $checkout) 
    {
     	$rooms = DB::table('reservation')
        	// checkin after start and before end
        	->where('checkin', '<=', $checkin)
        	->where('checkout', '>=', $checkin)
        	// checkout after start and before end
        	->orWhere('checkin', '<=', $checkout)
			->where('checkout', '>=', $checkout)
        	// checkin before start and checkout after end
        	->orWhere('checkin', '>=', $checkin)
			->where('checkout', '<=', $checkout)
			->join('room_reservation', 'reservation.id', '=', 'room_reservation.reservationid')
            ->select('room_reservation.roomid')
            ->orderby('room_reservation.roomid')
            ->get();

        return $rooms;
    }

    public static function unavailableDuring($checkin, $checkout) 
    {
        $rooms = DB::table('room_availability')
        	// checkin after start and before end
        	->where('startdate', '<=', $checkin)
        	->where('enddate', '>=', $checkin)
        	// checkout after start and before end
        	->orWhere('startdate', '<=', $checkout)
			->where('enddate', '>=', $checkout)
        	// checkin before start and checkout after end
        	->orWhere('startdate', '>=', $checkin)
			->where('enddate', '<=', $checkout)
            ->select('roomid')
            ->get();

        return $rooms;
    }

    public static function currentlyBooked()
    {
    	$now = Carbon\Carbon::now();

        $rooms = DB::table('reservation')
            ->where('reservation.checkin', '<=', $now)
            ->where('reservation.checkout', '>=', $now)
            ->join('room_reservation', 'reservation.id', '=', 'room_reservation.reservationid')
            ->join('room', 'room.id', '=', 'room_reservation.roomid')
            ->distinct()
            ->get();

        return $rooms;
    }

    public static function currentlyUnavailable()
    {
    	$now = Carbon\Carbon::now();

        $rooms = DB::table('room_availability')
            ->where('room_availability.startdate', '<=', $now)
            ->where('room_availability.enddate', '>=', $now)
            ->select('room_availability.roomid')
            ->get();

        return $rooms;
    }
}
