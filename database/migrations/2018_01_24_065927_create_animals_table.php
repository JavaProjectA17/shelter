<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('image');
//            $table->text('about');
//            $table->timestamps();
            $table->increments('id');
            $table->string('name')->nullable();//name
            $table->text('about')->nullable();//description
            $table->string('image')->nullable();//image
//            $table->foreign('category_id')->references('id')->on('users');
            $table->integer('category_id')->nullable();
            $table->integer('shelter_id')->nullable();
            $table->date('birth_date')->nullable();
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
        Schema::dropIfExists('animals');
    }
}
