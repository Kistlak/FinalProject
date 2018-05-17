<?php

use Faker\Generator as Faker;

$factory->define(\App\Show::class, function (Faker $faker) {
    return [
        'date' => $faker->date('Y-m-d'),
        'time' => $faker->randomElement(['10:30', '13:30', '18:30']),
        'movie_id' => function () { return factory(\App\Movie::class)->create()->id; },
    ];
});
