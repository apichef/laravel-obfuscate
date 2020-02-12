<?php

use Faker\Generator as Faker;
use ApiChef\Obfuscate\Dummy\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});
