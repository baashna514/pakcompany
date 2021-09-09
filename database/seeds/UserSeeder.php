<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Moin Abbas',
            'shop_name' => 'WebEasy',
            'email' => 'moin@gmail.com',
            'status' => TRUE,
            'password' => Hash::make('password'),
            'phone' => '03321773514',
            'Country' => 'Pakistan',
            'address1' => 'Room#130, KEMU doctors hostel, Hall road, Lahore',
            'city' => 'Lahore',
            'is_admin' => true,
        ]);
    }
}
