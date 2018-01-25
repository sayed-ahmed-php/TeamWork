<?php

use Illuminate\Database\Seeder;

class MainCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('main_categories') -> insert([
            [
                'name' => 'Web Design',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'name' => 'Web Develop',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'name' => 'Desktop',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'name' => 'Mobile Develop',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'name' => 'DataBase',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'name' => 'IT',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'name' => 'Games',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'name' => 'Full-Stack',
                'overview' => 'its very good language to code it .............................................',
            ]
        ]);
    }
}
