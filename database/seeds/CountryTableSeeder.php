<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries') -> insert([
            [
                'name' => 'Egypt',
            ],
            [
                'name' => 'USA',
            ],
            [
                'name' => 'Japan',
            ],
            [
                'name' => 'France',
            ]
        ]);
    }
}
