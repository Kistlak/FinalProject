<?php

use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(['A', 'B', 'C'])->each(function ($letter) {
           foreach (range(1, 10) as $number) {
               \App\Seats::create(['name' => $letter . $number]);
           }
        });
    }
}
