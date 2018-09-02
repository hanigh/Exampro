<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exams_id')->unsigned();
            $table->foreign('exams_id')->references('id')->on('exams');
            $table->text('json');
            $table->string('type');
            $table->string('ques1');
            $table->string('ques2');
            $table->string('ques3');
            $table->string('ques4');
            $table->string('answer');
            $table->string('image');

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
        Schema::dropIfExists('questions');
    }
}
