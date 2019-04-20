<?php

use App\Models\User;
use App\Models\Session;
use Faker\Generator as Faker;

$factory->define(Session::class, function (Faker $faker) {
    $languages = [
        'php', 'ruby', 'java', 'c++', 'c', 'javascript', 'go', 'haskell', 'perl', 'python', 'swift', 'rust', 'objective-c', 'c#',
    ];

    return [
        'title' => $faker->sentence(4),
        'description' => $faker->paragraph(4),
        'devs_needed' => rand(1, 3),
        'language' => $languages[rand(0, 13)],
        'creator_id' => factory(User::class),
        'session_date' => $faker->dateTimeBetween('-30 days', '+60 days'),
    ];
});

$factory->afterCreating(Session::class, function ($session, $faker) {
    $session->pairedDevs()->save(factory(User::class)->create());
});
