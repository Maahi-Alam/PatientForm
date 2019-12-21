<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Division::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'phone_extention' =>$faker->numberBetween(10,88),

    ];
});

$factory->define(App\District::class, function (Faker\Generator $faker) {
    return [
        'division_id' => $faker->numberBetween(1,8),
        'name' => $faker->name,
        'phone_extention' =>$faker->numberBetween(10,88),

    ];
});

$factory->define(App\Thana::class, function (Faker\Generator $faker) {
    return [
        'district_id' => $faker->numberBetween(1,320),
        'name' => $faker->name,
        'phone_extention' =>$faker->numberBetween(10,88),

    ];
});

$factory->define(App\Patient::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'dob' => $faker->date('y-m-d'),
        'cell' => $faker->randomDigit,
        'dieses' => $faker->text,
        'division_id' => $faker->numberBetween(1,8),
        'district_id' => $faker->numberBetween(1,64),
        'thana_id' => $faker->numberBetween(1,320),
    ];
});
