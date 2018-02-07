<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoveltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novelties', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 100);
            $table->string('image',100)->nullable();
            $table->string('short_description',200)->nullable();
            $table->text('description')->nullable();
            $table->date('start')->nullable();
            $table->boolean('relevant')->default(False);
            $table->boolean('confirmed')->default(False);

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
        Schema::dropIfExists('novelties');
    }
}
