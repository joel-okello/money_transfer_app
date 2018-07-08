<?php

use Faker\Generator as Faker;

$factory->define(App\transactions::class, function (Faker $faker) {
    return [
        //


                     
'amount' => $faker->numberBetween(10000,2000000),                            
'sender_account' => $faker->numberBetween(1,10),                             
'reciever_account' => $faker->numberBetween(10,40),                           
    ];
});
