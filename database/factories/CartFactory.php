<?php

use Faker\Generator as Faker;

$factory->define(App\Cart::class, function (Faker $faker) {
    return [
        'seller_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'buyer_id' => null,
        'name' => $faker->text(30),
//        'image_url' => $faker->imageUrl(128, 128),
        'image_url' => 'https://www.adidas.com.au/dis/dw/image/v2/aagl_prd/on/demandware.static/Sites-adidas-AU-Site/Sites-adidas-products/en_AU/v1516665929386/zoom/CQ2386_01_standard.jpg?sw=256&sh=256&sm=fit',
        'sku' => $faker->numberBetween(),
        'size' => $faker->numberBetween(4, 14),
        'price' => $faker->numberBetween(50, 300) * 100,
        'site' => $faker->countryCode,
        'username' => $faker->email,
        'password' => $faker->password
    ];
});
