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
        if (\App\User::where('name', 'john')->doesntExist())
            $this->call(UsersTableSeeder::class);
        if (\App\Issue::doesntExist())
            $this->call(IssuesTableSeeder::class);
        $this->call(EnvironmentsTableSeeder::class);
    }
}
