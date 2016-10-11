<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	protected $table = 'reservation';

	protected $fillable = array('checkin', 'checkout', 'adults', 'note', 'guestid');


	public function guest() {
        return $this->hasOne('App\Guest');
    }
}
