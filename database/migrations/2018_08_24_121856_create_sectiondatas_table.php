<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectiondatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectiondatas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('dispensing_fee');
            $table->string('clarifying_detail');
            $table->string('source');
            $table->string('source_link');
            $table->integer('sections_id')->unsigned();
            $table->foreign('sections_id')->references('id')->on('sections')->onDelete('cascade');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('questions_id')->unsigned();
            $table->foreign('questions_id')->references('id')->on('questions')->onDelete('cascade');
            $table->enum('question_type', ['1', '2']);
            $table->enum('table_select',['1', '2']);
            $table->enum('active', ['0', '1']);
          
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
        Schema::dropIfExists('sectiondatas');
    }
}
