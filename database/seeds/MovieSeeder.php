<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Movie::class, 50)->create()->each(function (\App\Movie $movie) {
            $from = \Carbon\Carbon::now();
            $to = \Carbon\Carbon::now()->addDays(20);

            while ($from->lte($to)) {
                collect(['10:30', '13:30', '18:30'])->each(function ($time) use ($from, $movie) {
                    $show = new \App\Show([
                        'date' => $from,
                        'time' => $time
                    ]);

                    $movie->shows()->save($show);
                });

                $from->addDay();
            }
        });
    }
}
