<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->text('date');
            $table->enum('d_status',['delivered','not_delivered'])->default('not_delivered');
            $table->enum('schedule',['schedule','not_scheduled'])->default('not_scheduled');
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('SET NULL');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('SET NULL');
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
        Schema::dropIfExists('tasks');
    }
}
