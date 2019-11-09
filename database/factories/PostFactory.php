<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'body' =>  $faker->paragraph,
        'user_id' => function () {
                        return User::inRandomOrder()->first()->id;
                        //return factory(App\User::class)->create()->id;
                    },
        'cover_image' => 'noimage.jpg'
    ];
});
