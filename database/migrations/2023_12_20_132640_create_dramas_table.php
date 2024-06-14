<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('dramas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('day');
            $table->string('time');
            $table->string('male_lead');
            $table->string('female_lead');
            $table->string('writter');
            $table->string('producer');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dramas');
    }
};
