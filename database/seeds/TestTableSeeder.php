<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests') -> insert([
            [
                'name' => 'Php',
                'category' => 'Back-End',
                'overview' => 'In this test you have 40 questions in 40 minutes. To pass this test you have to answer 50% correctly.',
            ],
            [
                'name' => 'Java',
                'category' => 'Desktop',
                'overview' => 'In this test you have 40 questions in 40 minutes. To pass this test you have to answer 50% correctly.',
            ],
            [
                'name' => 'Html-Css',
                'category' => 'Front-End',
                'overview' => 'In this test you have 40 questions in 40 minutes. To pass this test you have to answer 50% correctly.',
            ]
        ]);
    }
}
