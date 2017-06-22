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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Produk::class, function (Faker\Generator $faker) {

    return [
        'lapak_id' => $faker->numberBetween(11,12),
        'name' => $faker->company,
        'kategori_produk_id' => 2,
        'unit' => $faker->randomElement(array('Kilogram', 'pack', 'gram')),
        'harga' =>  round($faker->numberBetween(4000,15000), -3),
        'deskripsi' => $faker->catchPhrase,
        'foto1' => "/storage/tokoDefault.jpg",
        'foto2' => null,
        'foto3' => null,
        'view' => $faker->numberBetween(0,100),
        'stok' => $faker->numberBetween(0,100),
        'antar' => 1,
        'rating' => 4,
        'aktif' => 1,
    ];
});

$factory->define(App\Review::class, function (Faker\Generator $faker) {

    return [
        'nasabah_id' => $faker->numberBetween(11,12),
        'rating' => $faker->numberBetween(3,5),
        'review' => $faker->sentence(9, true),
    ];
});
