<?php

use Illuminate\Database\Seeder;

use App\Price;
use App\Room;

class MoreRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			 Eloquent::unguard();
        // add more rooms with different capacities
        foreach(range(1, 5) as $index)
        {
        	foreach(range(2, 6) as $capacity)
    		{
	            Room::create([
	                'roomnumber' => $index + 100 * $capacity,
	                'capacity' => $capacity + 1,
	                'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing',
	            ]);
	        }
        }

        // delete existing prices
		DB::table('room_price')->delete();

		// add prices for all rooms
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
    }
}
