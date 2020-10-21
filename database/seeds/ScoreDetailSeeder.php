<?php

use Illuminate\Database\Seeder;
use App\ScoreDetail;

class ScoreDetailSeeder extends Seeder
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
                'id_score_detail' => 'SD0001',
                'question_id' => 'Q001',
                'score' => 0,
                'desc' => 'Tidak ada nilai nol',
            ],
            [
                'id_score_detail' => 'SD0002',
                'question_id' => 'Q001',
                'score' => 1,
                'desc' => 'Visi, misi, tujuan dan sasaran yang:
                (1)Tidak jelas.
                (2)Tidak realistik.
                (3)Tidak terkait satu sama lain.
                (4) Tidak ada waktu pencapaian.',
            ],
            [
                'id_score_detail' => 'SD0003',
                'question_id' => 'Q001',
                'score' => 2,
                'desc' => 'Visi, misi, tujuan dan sasaran yang:
                (1)Cukup jelas.
                (2)Cukup realistik.
                (3)Kurang terkait satu sama lain.
                (4) Tidak ada waktu yang spesifik',
            ],
            [
                'id_score_detail' => 'SD0004',
                'question_id' => 'Q001',
                'score' => 3,
                'desc' => 'Visi, misi, tujuan dan sasaran yang:
                (1)Jelas.
                (2)Realistik.
                (3)Saling terkait satu sama lain.
                (4) Dicapai dalam periode waktu tertentu',
            ],
            [
                'id_score_detail' => 'SD0005',
                'question_id' => 'Q001',
                'score' => 4,
                'desc' => 'Visi, misi, tujuan dan sasaran yang:
                (1)Sangat jelas.
                (2)Sangat realistik.
                (3)Saling terkait satu sama lain.
                (4) Dicapai dalam periode waktu tertentu.',
            ]
        ];
        foreach($datas as $data){
            $score_details = ScoreDetail::create($data);
        }
    }
}
