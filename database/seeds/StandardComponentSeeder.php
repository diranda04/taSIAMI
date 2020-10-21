<?php

use Illuminate\Database\Seeder;
use App\StandardComponent;

class StandardComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'id_standard_component'=>'KD1-1',
                'desc' => 'Komponen Standar 1.1: Standar Visi, Misi, Tujuan dan Sasaran (VMTS)',
                'standard_id' => 'STD1',
            ],
            [
                'id_standard_component'=>'KD1-2',
                'desc' => 'Komponen Standar 1.2: Standar Sasaran, Strategis dan Program serta Indikator Kinerja',
                'standard_id' => 'STD1',
            ],
            [
                'id_standard_component'=>'KD2-1',
                'desc' => 'Komponen  Standar 2.1: Sistem Tata Pamong ',
                'standard_id' => 'STD2',
            ],
            [
                'id_standard_component'=>'KD2-2',
                'desc' => 'Komponen  Standar 2.2: Standar Kepemimpinan ',
                'standard_id' => 'STD2',
            ]
        ];
        foreach($datas as $data){
            $standard_components = StandardComponent::create($data);
        }
    }
}
