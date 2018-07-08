<?php

use Faker\Generator as Faker;

$factory->define(App\accounts::class, function (Faker $faker) {
    return [
 'account_name'=> $faker->Name,                 
 'account_type' =>  $faker->randomElement(['bank_account','mobile_money']),               
'account_number' => $faker->randomNumber($nbDigits = 8),                                    
'user_id' => $faker->numberBetween(11,30),    
    ];
});
