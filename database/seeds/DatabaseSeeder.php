<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //factory('App\User',30)->create();
        //factory('App\accounts',30)->create();
        factory('App\transactions',60)->create();
    }
}
