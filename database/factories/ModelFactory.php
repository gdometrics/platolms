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
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'first' => $faker->firstName,
        'last' => $faker->lastName,
        'bio' => $faker->text,
        'img' => $faker->imageUrl(200, 200, 'people', true, 'PlatoLMS', true),
        'question' => $faker->sentence,
        'answer' => $faker->word,
        'address' => $faker->streetAddress,
        'address_2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'postal' => $faker->randomNumber(5),
        'state' => $faker->stateAbbr,
        'country' => $faker->country,
        'timezone' => $faker->timezone,
        'phone' => $faker->phoneNumber,
        'ip' => $faker->ipv4,
        'remember_token' => str_random(10),
    ];
});
