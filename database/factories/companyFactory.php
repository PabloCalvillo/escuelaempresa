<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\company::class, function (Faker $faker) {
    return [
		'name' => $faker->unique()->name,
		'city' => $faker->city,
		'cp' => $faker->postcode
    ];
});
