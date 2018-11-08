<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\petition::class, function (Faker $faker) {
    return [
		'id_company' => escuelaempresa\company::all()->random()->id,
		'id_grade' => escuelaempresa\grade::all()->random()->id,
		'type' => $faker->randomElement($array = array ('FCT','Prácticas')),
		'n_students' => $faker->numberBetween($min = 1, $max = 30)
    ];
});
