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
$factory->define(PackageTracking\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(PackageTracking\Shipment::class, function (Faker\Generator $faker) {
	return [
		'name' => ucfirst($faker->words(mt_rand(2, 4), true)),
		'status' => PackageTracking\Shipment::STATUS_PROCESSING,
		'carrier' => $faker->company,
		'delivery_date' => \Carbon\Carbon::today()->addDays(mt_rand(5, 12))
	];
});
