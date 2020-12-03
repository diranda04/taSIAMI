<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodes', function (Blueprint $table) {
            $table->string('id_periode', 5);
            $table->string('instrument_id', 6);
            $table->date('audit_start_at');
            $table->date('audit_end_at');
            $table->timestamps();

            $table->primary('id_periode');
            $table->foreign('instrument_id')->references('id_instrument')->on('instruments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodes');
    }
}
