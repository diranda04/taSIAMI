<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_scores', function (Blueprint $table) {
            $table->string('id_audit_score', 6);
            $table->string('question_id', 6);
            $table->integer('score_auditee')->nullable();
            $table->integer('score_auditor')->nullable();
            $table->string('audit_id', 5);
            $table->timestamps();

            $table->primary('id_audit_score');
            $table->foreign('question_id')->references('id_question')->on('questions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('audit_id')->references('id_audit')->on('audits')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_scores');
    }
}
