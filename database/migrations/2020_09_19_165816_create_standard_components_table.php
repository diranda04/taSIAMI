<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_components', function (Blueprint $table) {
            $table->string('id_standard_component', 6);
            $table->text('desc');
            $table->string('standard_id', 6);
            $table->timestamps();

            $table->primary('id_standard_component');
            $table->foreign('standard_id')->references('id_standard')->on('standards')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standard_components');
    }
}
