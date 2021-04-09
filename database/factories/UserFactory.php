<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

/*$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});*/

/*
 * NewsCRUD
 */

$factory->define(\App\Author::class, function (Faker\Generator $faker) {
    return [
        'name'           => ucfirst($faker->unique()->word),
        'created_at'     => Carbon::now()->subDays(rand(0, 30)),
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        //'author_id' => rand(1, 8),
        'title'       => ucfirst($faker->unique()->sentence(2)),
        'description'     => $faker->text(800),
        'image' => 'no-image.jpg',
        'created_at'  => Carbon::now()->subDays(rand(0, 30)),
    ];
});
