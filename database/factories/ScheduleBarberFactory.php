<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ScheduleBarber::class, function (Faker $faker) {
    return [
        'barber_id' => function () {
            return factory(\App\Barber::class)->create()->id;
        },
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'costumer_id' => function () {
            return factory(\App\Costumer::class)->create()->id;
        },
        'service_id' => function () {
            return factory(\App\Service::class)->create()->id;
        }
    ];
});
