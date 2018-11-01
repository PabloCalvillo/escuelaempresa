<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\student::class, function (Faker $faker) {
    return [
        'name' => $faker -> name,
        'lastname' => $faker -> lastname,
        'age' => $faker -> numberBetween($min = 16, $max = 50),
    ];
});
