<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->id();
            $table->string('medicaldoc');
            $table->string('location');
            $table->string('dos');
            $table->string('patient');
            $table->integer('provider_id');
            $table->integer('insurance_id');
            $table->string('medical_status');
            $table->string('file_type');
            $table->string('denial_date');
            $table->string('encounter');
            $table->string('medical_reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicals');
    }
}
