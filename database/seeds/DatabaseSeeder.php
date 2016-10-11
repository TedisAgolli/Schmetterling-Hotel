<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(MoreRoomsSeeder::class);
        $this->call(PaymentSeeder::class);

        Model::reguard();
    }
}
