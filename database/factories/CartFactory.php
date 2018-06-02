<?php

use Faker\Generator as Faker;

$factory->define(App\Cart::class, function (Faker $faker) {
    return [
        'name' => $faker->text(30),
        'image_url' => $faker->imageUrl(128, 128),
        'sku' => $faker->numberBetween(),
        'size' => $faker->numberBetween(4, 14),
        'price' => $faker->numberBetween(50, 300) * 100,
        'site' => $faker->countryCode,
        'username' => $faker->email,
        'password' => $faker->password
    ];
});
