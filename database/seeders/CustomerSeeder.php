<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('customer')->insert([
            'name' => "rafi",
            'phone' => "091212",
            'email' => "adda",
            'address' => "makam rumah"
        ]);
    }
}
