<?php

use Illuminate\Database\Seeder;

class MainSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_skills') -> insert([
            [
                'cat_id' => 1,
                'name' => 'Html-Css',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'cat_id' => 3,
                'name' => 'Java',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'cat_id' => 2,
                'name' => 'Php',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'cat_id' => 4,
                'name' => 'Android',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'cat_id' => 5,
                'name' => 'Oracle',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'cat_id' => 6,
                'name' => 'Linux Admin',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'cat_id' => 7,
                'name' => 'Unity',
                'overview' => 'its very good language to code it .............................................',
            ],
            [
                'cat_id' => 8,
                'name' => 'Ui-Ux',
                'overview' => 'its very good language to code it .............................................',
            ]
        ]);
    }
}
