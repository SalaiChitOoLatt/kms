<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'phone' => '09252678817',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('abcd123#'),
        ]);
    }
}
