<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
	protected $table = 'payment_info';

	protected $fillable = array('creditcardtype', 'cardnumber', 'expirationdate', 'guestid');
}
