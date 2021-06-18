<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desig_id')->nullable();
            $table->unsignedBigInteger('reg_id')->nullable();
            $table->text('file');
            $table->foreign('desig_id')->references('id')->on('designations')->onDelete('SET NULL');
            $table->foreign('reg_id')->references('id')->on('employees')->onDelete('SET NULL');
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
        Schema::dropIfExists('jobs');
    }
}
