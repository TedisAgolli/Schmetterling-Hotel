<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = date("Y-m-d H:i:s");

        DB::table('user')->insert([
            'username' => 'manager',
            'password' => bcrypt('password'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('user')->insert([
            'username' => 'reception',
            'password' => bcrypt('password'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
