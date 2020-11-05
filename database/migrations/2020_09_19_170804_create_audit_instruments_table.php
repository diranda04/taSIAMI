<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditInstrumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_instruments', function (Blueprint $table) {
            $table->id();
            $table->string('standard_id', 6);
            $table->string('periode_id', 5);
            $table->timestamps();

            $table->foreign('standard_id')->references('id_standard')->on('standards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('periode_id')->references('id_periode')->on('periodes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_instruments');
    }
}
