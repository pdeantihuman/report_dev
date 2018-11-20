<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 20)->create();
        $user = factory(\App\User::class)->create();
        $user->name='john';
        $user->email = 'pdeantihuman@gmail.com';
        $user->password = bcrypt('secret');
        $user->alleys = [8];
        $user->save();
    }
}
