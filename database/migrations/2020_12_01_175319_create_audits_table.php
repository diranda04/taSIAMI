<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->string('id_audit', 8);
            $table->string('periode_id', 5);
            $table->string('department_id', 12);
            $table->timestamps();

            $table->primary('id_audit');
            $table->foreign('periode_id')->references('id_periode')->on('periodes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('department_id')->references('id_department')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits');
    }
}
