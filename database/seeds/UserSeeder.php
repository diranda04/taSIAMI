<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => Str::random(10),
            'name' => 'Dira Yosfiranda',
            'username' => 'diranda',
            'email' => 'diranda@gmail.com',
            'password' => bcrypt('diranda'),
            'role_id' => 1,
            'remember_token' => Str::random(30),
        ]);
    }
}
