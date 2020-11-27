<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->string('id_department', 12);
            $table->string('department_name', 100);
            $table->string('faculty_id', 12);
            $table->string('accreditation', 1);
            $table->text('sk_num')->unique()->nullable();
            $table->timestamps();

            $table->primary('id_department');
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
        Schema::dropIfExists('departments');
    }
}
