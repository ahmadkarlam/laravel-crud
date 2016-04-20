<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Administrator', 
            'email' => 'admin@blog.app',
            'password' => bcrypt('admin'),
        ]);
    }
}
