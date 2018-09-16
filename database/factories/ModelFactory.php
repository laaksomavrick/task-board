<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$RUv/q9KpMwJ/R800HwmeP.7pBHVM63HiB1UL6X7rAdN2X/OIG8Hnq', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'team_id' => function () {
            return factory(App\Team::class)->create()->id;
        },
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});

$factory->define(App\Issue::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'project_id' => function () {
            return factory(App\Project::class)->create()->id;
        },
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'status' => 'todo'
    ];
});