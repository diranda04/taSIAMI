<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_details', function (Blueprint $table) {
            $table->string('id_score_detail', 8);
            $table->string('question_id', 6);
            $table->integer('score');
            $table->text('desc');
            $table->timestamps();

            $table->primary('id_score_detail');
            $table->foreign('question_id')->references('id_question')->on('questions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score_details');
    }
}
