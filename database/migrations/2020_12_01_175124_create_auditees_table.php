<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditees', function (Blueprint $table) {
            $table->string('id_auditee', 25);
            $table->string('user_id', 25);
            $table->string('department_id', 12);
            $table->year('start_at');
            $table->year('end_at');
            $table->timestamps();

            $table->primary('id_auditee');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('auditees');
    }
}
