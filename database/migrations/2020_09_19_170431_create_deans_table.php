<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deans', function (Blueprint $table) {
            $table->string('id_dean', 25);
            $table->string('lecturer_id', 25);
            $table->string('faculty_id', 5);
            $table->year('start_at');
            $table->year('end_at');
            $table->timestamps();

            $table->primary('id_dean');
            $table->foreign('lecturer_id')->references('id_lecturer')->on('lecturers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('faculty_id')->references('id_faculty')->on('faculties')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deans');
    }
}
