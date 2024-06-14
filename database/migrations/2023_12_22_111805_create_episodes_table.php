<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('drama_id');
            $table->foreign('drama_id')->references('id')->on('dramas')->onDelete('cascade');
            
            $table->integer('episode_number');
            $table->integer('duration');
            $table->string('type');
            $table->string('sponsored_by')->nullable();
            $table->string('associated_by')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
