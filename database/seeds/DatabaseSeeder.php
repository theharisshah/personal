<?php

use Haris\Models\Admin;
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
        $admin = new Admin();
        $admin->first_name = 'Haris';
        $admin->last_name ='Shah';
        $admin->email = 'theharisshah@gmail.com';
        $admin->password = bcrypt('CSE13le@98');
        $admin->username = 'haris';
        $admin->status = true;
        $admin->save();
    }
}
