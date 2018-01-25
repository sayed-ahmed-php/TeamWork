<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MainCategoryTableSeeder::class);
        $this->call(MainSkillTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(TestTableSeeder::class);
        $this->call(Html_CssTableSeeder::class);
        $this->call(JavaTableSeeder::class);
        $this->call(PhpTableSeeder::class);
        $this->call(AdminTableSeeder::class);
    }
}
