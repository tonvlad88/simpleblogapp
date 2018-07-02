<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'tony88',
            'name' => 'Tony Saromines',
            'email' => 'tony@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
