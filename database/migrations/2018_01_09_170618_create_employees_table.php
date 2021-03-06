<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('designation', 50);
            $table->string('email', 80)->unique();
            $table->string('phone', 30)->nullable();
            $table->text('caddress')->nullable();
            $table->text('paddress')->nullable();
            $table->string('image', 100)->nullable();
            $table->integer('salary_scale')->unsigned()->nullable();
            $table->text('experience')->nullable();
            $table->string('gender', 20);
            $table->string('nationality', 30)->nullable();
            $table->string('religion', 30)->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->string('nid', 50);
            $table->rememberToken();
            $table->string('joining_date', 50)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
