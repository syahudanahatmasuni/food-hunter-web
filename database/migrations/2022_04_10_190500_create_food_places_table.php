<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreignId('category_id')->constrained();
            $table->string('title');
            $table->string('slug');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->longText('about');
            $table->string('favorite_menu');
            $table->string('location');
            $table->string('open_hours');
            $table->text('cover');
            $table->double('rating');
            $table->integer('count_rating');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_places');
    }
}
