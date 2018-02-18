<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_papers', function (Blueprint $table) {
            $table->increments('quest_id');
            $table->string('exam_id', 100);
            $table->string('question_type', 80);
            $table->string('question', 150);
            $table->tinyInteger('quest_status')->unsigned();
            $table->string('quest_option1', 100)->nullable();
            $table->string('quest_option2', 100)->nullable();
            $table->string('quest_option3', 100)->nullable();
            $table->string('quest_option4', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_papers');
    }
}
