<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvsalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advsalaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->text('month');
            $table->text('year');
            $table->double('advanced_salary');
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('SET NULL');
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
        Schema::dropIfExists('advsalaries');
    }
}
