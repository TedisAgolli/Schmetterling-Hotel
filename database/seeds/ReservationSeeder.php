<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

use App\Guest;
use App\Order;
use App\Price;
use App\Reservation;
use App\Room;
use App\RoomAvailability;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

    	// GUEST
        foreach(range(1, 10) as $index)
        {
            Guest::create([
                'firstname' => $faker->firstName(),
                'lastname' => $faker->firstName()
            ]);
        }

        // RESERVATION
        $guests = Guest::all();
        foreach(range(1,50) as $index){

			if ($index % 3 == 0) {
        		// bookings that start and end before today
            	$checkin = $faker->dateTimeBetween($startDate = '-2 week', $endDate = '-1 week');
            	$checkout = $faker->dateTimeBetween($startDate = '-1 week', $endDate = '-1 day');
        	} else if ($index % 3 == 1) {
        		// booking that start before today and end after today
            	$checkin = $faker->dateTimeBetween($startDate = '-1 week', $endDate = '-1 day');
            	$checkout = $faker->dateTimeBetween($startDate = '+1 day', $endDate = '+1 week');
        	} else if ($index % 3 == 2) {
        		// booking that start and end after today
            	$checkin = $faker->dateTimeBetween($startDate = '+1 day', $endDate = '+1 week');
            	$checkout = $faker->dateTimeBetween($startDate = '+1 week', $endDate = '+2 week');
        	}

            $reservation = Reservation::create([
				'checkin' => $checkin,
				'checkout' => $checkout,
            	'adults' => 2,
            	'note' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et.',
            	'guestid' => $guests[rand(0, count($guests)-1 )]['id'],
            ]);
        }

        // ROOM
        foreach(range(1, 10) as $index)
        {
            Room::create([
                'roomnumber' => $index + 100,
                'capacity' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing',
            ]);
        }

        // ROOM RESERVATION
        $rooms = Room::all();
        $reservations = Reservation::all();
        foreach($reservations as $index)
        {
        	$now = date("Y-m-d H:i:s");

            DB::table('room_reservation')->insert([
	            'roomid' => $rooms[rand(0, count($rooms)-1 )]['id'],
	            'reservationid' => $index['id'],
	            'created_at' => $now,
	            'updated_at' => $now,
        	]);
        }

        // PRICE
        foreach(range(1, 10) as $index)
        {
            Price::create([
                'value' => $index * 10 + 10,
                'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing',
            ]);
        }

        // ROOM PRICE
        $rooms = Room::all();
        $prices = Price::all();
        foreach($rooms as $index)
        {
            $now = date("Y-m-d H:i:s");

            DB::table('room_price')->insert([
                'roomid' => $index['id'],
                'priceid' => $prices[rand(0, count($prices)-1 )]['id'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // ROOM AVAILABILITY
        $rooms = Room::all();
        foreach(range(1, 3) as $index)
        {
            RoomAvailability::create([
                'available' => false,
                'note' => 'Lorem ipsum dolor sit amet, consetetur sadipscing',
                'roomid' => $rooms[rand(0, count($rooms)-1 )]['id'],
                'startdate' => $faker->dateTimeBetween($startDate = '-1 week', $endDate = '-1 day'),
                'enddate' => $faker->dateTimeBetween($startDate = '+1 day', $endDate = '+1 week'),
            ]);
        }

        // ORDERS
        $reservations = Reservation::all();
        $prices = Price::all();
        foreach($reservations as $index)
        {
            Order::create([
                'currentprice' => 50,
                'ordertime' => $faker->dateTimeBetween($startDate = '-1 month', $endDate = '-1 day'),
                'note' => 'Lorem ipsum dolor sit amet, consetetur sadipscing',
                'reservationid' => $index['id'],
                'priceid' => $prices[rand(0, count($prices)-1 )]['id'],
            ]);
        }
    }
}
