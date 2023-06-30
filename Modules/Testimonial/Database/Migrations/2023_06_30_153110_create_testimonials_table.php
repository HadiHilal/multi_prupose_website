<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('position');
            $table->json('comment');
            $table->tinyInteger('publish')->default(1);
            $table->string('link')->default('#');
            $table->string('img')->default('imgs/blank.png');
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
        Schema::dropIfExists('testimonial');
    }
};
