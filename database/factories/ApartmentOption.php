<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Apartment;
Use App\Option;

$factory->define(ApartmentOption::class, function (Faker $faker) {
    return [
        'apartment_id' => Apartment::inRandomOrder()->first()->id,
        'option_id' => Option::inRandomOrder()->first()->id
    ];
});
