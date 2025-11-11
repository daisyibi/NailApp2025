<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nail_techs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('speciality');
            $table->string('hourly_rate');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nail_techs');
    }
};
