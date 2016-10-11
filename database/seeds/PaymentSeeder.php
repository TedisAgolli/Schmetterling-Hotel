<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Guest;
use App\PaymentInfo;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
        	// find guest with id
        	$guest = Guest::find($index);

        	// add payment info for this guest
            PaymentInfo::create([
                'creditcardtype' => $faker->creditCardType(),
                'cardnumber' => $faker->creditCardNumber(),
                'expirationdate' => $faker->dateTimeBetween($startDate = '+2 years', $endDate = '+3 years'),
                'guestid' => $guest->id
            ]);
        }
    }
}
