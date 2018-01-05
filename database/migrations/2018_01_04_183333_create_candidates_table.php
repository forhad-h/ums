<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('phone', 30)->nullable();
            $table->string('gname', 50);
            $table->string('gphone', 30);
            $table->string('nid', 50)->nullable();
            $table->string('email', 80)->nullable()->unique();
            $table->string('gender', 20);
            $table->string('bdate', 50);
            $table->integer('subject_first');
            $table->integer('subject_second');
            $table->integer('subject_third');
            $table->text('caddress');
            $table->text('paddress');
            $table->string('nationality', 30);
            $table->string('religion', 30);
            $table->string('image', 100);
            $table->string('simage', 100);
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
        Schema::dropIfExists('candidates');
    }
}
