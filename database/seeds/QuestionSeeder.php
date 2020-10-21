<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionSeeder extends Seeder
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
                'id_question' => 'Q001',
                'desc' => 'Ketua Program Studi bertanggungjawab terhadap visi, misi, tujuan, dan sasaran yang jelas, realistik, berorientasi kemasa depan, dan memiliki keterkaitan untuk dicapai dalam periode waktu tertentu.',
                'standard_component_id' => 'KD1-1',
            ],
            [
                'id_question' => 'Q002',
                'desc' => 'Ketua Program Studi dalam merumuskan Visi, misi, tujuan dan sasaran melibatkan pihak internal (dosen, tenaga kependidikan dan mahasiswa) dan pihak ekternal (alumni, pengguna lulusan, dan assosiasi/perhimpunan/konsorsium).',
                'standard_component_id' => 'KD1-1',
            ],
            [
                'id_question' => 'Q003',
                'desc' => 'Ketua Jurusan/ Ketua Program Studi memiliki rencana pengembangan jangka panjang, menengah dan pendek serta memiliki indikator kinerja utama dan tambahan dengan target untuk mencapai sasaran strategis yang berorientasi internasional.',
                'standard_component_id' => 'KD1-2',
            ],
            [
                'id_question' => 'Q004',
                'desc' => 'Ketua Program Studi memiliki dokumen formal sistem tata pamong yang legal yang dijabarkan kedalam berbagai kebijakan dan peraturan yang digunakan secara konsisten, efektf dan efesien sesui konteks institusi serta menjamin akuntabilitas, keberlanjutan, transparansi, dan mitigasi potensi risiko.',
                'standard_component_id' => 'KD2-1',
            ]
        ];
        foreach($datas as $data){
            $questions = Question::create($data);
        }

    }
}
