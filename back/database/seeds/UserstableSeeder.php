<?php

use Illuminate\Database\Seeder;
use App\User;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->make();
    }
}
