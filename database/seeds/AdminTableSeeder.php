<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins') -> insert([
            [
                'name' => 'Sayed Ahmed',
                'username' => 'teamwork@teamwork.com',
                'password' => bcrypt('teamwork2017')
            ]
        ]);
    }
}
