<?php

use Faker\Generator as Faker;

/**
 * 生成随机日期的报修事件
 */
$factory->define(\App\Issue::class, function (Faker $faker) {
    return [
        'alley' => $faker->numberBetween(8,10),
        'room' => $faker->numberBetween(1,4) *100 + $faker->numberBetween(1,14),
        'description' => $faker->paragraph,
        'created_at' => $faker->dateTimeBetween('-1 years', 'now')
    ];
});
