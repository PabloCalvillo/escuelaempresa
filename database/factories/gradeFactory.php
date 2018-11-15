<?php

use Faker\Generator as Faker;

$factory->define(escuelaempresa\grade::class, function (Faker $faker) {
    return [
        'name' => $faker -> sentence($nbWords = 3, $variableNbWords = true),
        'level' => $faker -> randomElement($array = array ('FPB','CFGM','CFGS'))
    ];
});
