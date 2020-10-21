<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'  => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name'  => 'Auditor',
        ]);
        DB::table('roles')->insert([
            'name'  => 'Auditee',
        ]);
        DB::table('roles')->insert([
            'name'  => 'Dekan',
        ]);
    }
}
