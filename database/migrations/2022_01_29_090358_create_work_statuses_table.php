<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('file_name');
            $table->string('total_pages');
            $table->string('pdf_pages');
            $table->string('status');
            $table->string('work_file');
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
        Schema::dropIfExists('work_statuses');
    }
}
