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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'                  => $faker->name,
        'role_id'               => 2,
        'email'                 => $faker->safeEmail,
        'password'              => $password ?: $password = bcrypt('password'),
        'remember_token'        => str_random(10)
    ];
});

$factory->define(App\TimeEntry::class, function (Faker\Generator $faker) {;
    
    return [
        'task_name'     => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'start_time'    => $faker->dateTimeThisYear('09:00:00')->format('Y-m-d H:i:s'),
        'end_time'      => $faker->dateTimeThisYear('17:00:00')->format('Y-m-d H:i:s')
    ];
});

