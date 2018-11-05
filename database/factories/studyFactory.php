<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\study::class, function (Faker $faker) {
    return [
		'id_student' => escuelaempresa\student::all()->random()->id,
		'id_grade' => escuelaempresa\grade::all()->random()->id
    ];
});
