<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Role;
use Faker\Generator as Faker;
use App\Models\Employee;


$factory->define(Role::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text,
        //employees BelongsToMany Employee 
    ];
});
