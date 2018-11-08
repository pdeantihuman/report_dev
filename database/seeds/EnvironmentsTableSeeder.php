<?php

use Illuminate\Database\Seeder;

class EnvironmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('environments')->truncate();
        $default = [
            [
                'key' => 'minimum_alley',
                'value' => '8',
                'type' => 'number'
            ],
            [
                'key' => 'maximum_alley',
                'value' => '11',
                'type' => 'number'
            ],
            [
                'key' => 'reset_password',
                'value' => '0',
                'type' => 'boolean'
            ]
        ];
        DB::table('environments')->insert($default);
    }
}
