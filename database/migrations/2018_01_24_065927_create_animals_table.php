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

            $table->increments('id');
            $table->string('name')->nullable();//name
            $table->text('about')->nullable();//description
            $table->string('image')->nullable();//image
            $table->integer('category_id')->nullable();
            $table->integer('shelter_id')->unsigned();
//            $table->foreign('shelter_id')->references('id')->on('shelter')->onDelete('cascade');
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
