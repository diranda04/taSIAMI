<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_audits', function (Blueprint $table) {
            $table->string('id_department_audit', 5);
            $table->string('auditor_id', 25);
            $table->string('audit_id', 5);
            $table->timestamps();

            $table->primary('id_department_audit');
            $table->foreign('auditor_id')->references('id_auditor')->on('auditors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('department_audits');
    }
}
