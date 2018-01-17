<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_others', function (Blueprint $table) {
            $table->increments('payment_id');
            $table->string('payment_type', 50);
            $table->text('payment_des');
            $table->string('payment_method', 50);
            $table->integer('pamount_taka');
            $table->string('pamount_words', 120);
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
        Schema::dropIfExists('f_others');
    }
}