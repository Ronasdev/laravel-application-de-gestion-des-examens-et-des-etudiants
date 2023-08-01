<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('mobile')->nullable()->unique();
            $table->unsignedBigInteger('filiere_id');
            $table->timestamps();

            $table->foreign('filiere_id')->references('id')->on('filieres')
                ->onUpdate('restrict')
                ->onDelete('restrict');
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
