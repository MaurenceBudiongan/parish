<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('death_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('sex');
            $table->date('birth_date');
            $table->string('age');
            $table->string('birth_place');
            $table->string('civil_status');
            $table->string('address');
            $table->date('death_date');
            $table->string('place_of_death');
            $table->string('cause_of_death');
            $table->date('burial_date')->nullable();
            $table->string('burial_place')->nullable();
            $table->string('officiant')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('death_certificates');
    }
};
