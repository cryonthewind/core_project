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
         $this->call(MenusTableSeeder::class);
    }

}

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_menu')->insert(

            [
                'menu_id'=>7,
                'menu_title' => 'Menu main',
                'menu_link' => 'http://localhost:8000/admin/user',
                'menu_parent_id' => 3
            ]);
    }
}
