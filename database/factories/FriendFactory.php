<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Friend;
use Faker\Generator as Faker;

$factory->define(Friend::class, function (Faker $faker) {
    return [
        'status' => $faker->boolean() ,
        //foreign solicitado
        //foreign solicitante
    ];
});
