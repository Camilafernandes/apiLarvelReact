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
            'name' => 'Camila Silva Fernandes',
            'email' => 'camilasilvafernandes15@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
