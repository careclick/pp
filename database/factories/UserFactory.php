<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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


$factory->define(User::class, function (Faker $faker) {
    $array = array('admin','patient','doctor');
    $random = shuffle($array);
    $role = rand(0,1) ? 'patient' : 'doctor';

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'role'=> $role,
        'status'=> '0',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Transaction::class, function (Faker $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'amount' => '1000',
        'paymenttype' => 'card',
        'txref'=> Str::random(15),
        'status' => 'success', // password
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {

    do{
        $to = App\User::all()->random()->id;
        $from = App\User::all()->random()->id;
    }while( $from === $to);

    return [
        'to' => $to,
        'from' => $from,
        'text' => $faker->sentence,
    ];
});
