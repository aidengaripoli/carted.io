<?php

use Faker\Generator as Faker;

$factory->define(App\Cart::class, function (Faker $faker) {
    return [
        'seller_id' => function() {
            return factory(App\User::class)->create()->id;
        },
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
