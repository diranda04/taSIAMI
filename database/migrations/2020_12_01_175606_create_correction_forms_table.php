<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorrectionFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correction_forms', function (Blueprint $table) {
            $table->string('id_correction_form', 12);
            $table->string('audit_id', 8);
            $table->text('devience')->nullable();
            $table->text('causes')->nullable();
            $table->text('plan')->nullable();
            $table->timestamps();

            $table->primary('id_correction_form');
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
        Schema::dropIfExists('correction_forms');
    }
}
