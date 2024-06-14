<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{

    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('cnic', 15)->primary();
            $table->string('name', 35);
            $table->string('address', 75);
            $table->string('telno', 15);
            $table->double('age');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
}
