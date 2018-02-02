<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_salaries', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->integer('user_id');
            $table->string('payment_method', 50);
            $table->integer('pamount_taka');
            $table->string('pamount_words', 120);
            $table->string('payment_month', 80);
            $table->string('payment_date', 80);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('t_salaries');
    }
}
