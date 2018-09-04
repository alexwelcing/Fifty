<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 150)->unique();
            $table->text('description');

            $table->integer('states_id')->unsigned();
            $table->foreign('states_id')->references('id')->on('states')->onDelete('cascade');

            $table->string('categories_title', 255);

            $table->enum('table_rows', ['1', '2']);
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
        Schema::dropIfExists('datas');
    }
}
