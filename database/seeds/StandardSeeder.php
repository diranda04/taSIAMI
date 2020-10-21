<?php

use Illuminate\Database\Seeder;
use App\Standard;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('standards')->insert([
            'id_standard' => 'STD1',
            'name' => 'Standar 1 Visi Misi',
        ]);
        DB::table('standards')->insert([
            'id_standard' => 'STD2',
            'name' => 'Standar 2 Tata Kelola',
        ]);
    }
}
