<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->string('id_standard', 12);
            $table->string('instrument_id', 6);
            $table->string('name', 100);
            $table->timestamps();

            $table->primary('id_standard');
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
        Schema::dropIfExists('standards');
    }
}
