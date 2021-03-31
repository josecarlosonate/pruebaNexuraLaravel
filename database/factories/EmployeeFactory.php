<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;
use App\Models\Area;
use App\Models\Role;


$factory->define(Employee::class, function (Faker $faker) {
    return [
        'area_id' => factory(Area::class),
        'nombre' => $faker->text,
        'email' => $faker->safeEmail,
        'sexo' => $faker->text,
        'boletin' => $faker->randomDigit,
        'descripcion' => $faker->text(1024),
        //area BelongsTo Area area_id
        //roles HasMany Role id
    ];
});
