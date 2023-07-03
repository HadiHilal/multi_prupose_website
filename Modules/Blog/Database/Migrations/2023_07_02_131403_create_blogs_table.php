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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorey_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('img');
            $table->json('title');
            $table->string('slug');
            $table->json('intro');
            $table->json('content');
            $table->json('keywords')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('publish')->default(1);
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
        Schema::dropIfExists('blogs');
    }
};
