<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditFindingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_findings', function (Blueprint $table) {
            $table->string('id_audit_finding', 5);
            $table->string('audit_id', 5);
            $table->text('desc');
            $table->timestamps();

            $table->primary('id_audit_finding');
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
        Schema::dropIfExists('audit_findings');
    }
}
