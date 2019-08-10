<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Service::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat(0,30),
        'barber_id' => function () {
            return factory(App\Barber::class)->create()->id;
        },
    ];
});
