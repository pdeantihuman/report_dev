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
        $user = new \App\User();
        $user->name='john';
        $user->email = 'pdeantihuman@gmail.com';
        $user->password = bcrypt('secret');
        $user->alley = 8;
        $user->save();
    }
}
