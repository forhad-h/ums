<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('phone', 30)->nullable();
            $table->string('gname', 50);
            $table->string('gphone', 30);
            $table->string('nid', 50)->nullable();
            $table->string('email', 80)->nullable()->unique();
            $table->string('gender', 20);
            $table->string('bdate', 50);
            $table->text('caddress');
            $table->text('paddress');
            $table->string('nationality', 30)->nullable();
            $table->string('religion', 30)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('simage', 100)->nullable();
            $table->string('session_year', 20);
            $table->string('session_name', 20);
            $table->string('semester', 10)->default('1st');
            $table->integer('subject')->unsigned();
            $table->string('adate', 50);
            $table->tinyInteger('status')->unsigned()->default(1);
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
        Schema::dropIfExists('students');
    }
}
