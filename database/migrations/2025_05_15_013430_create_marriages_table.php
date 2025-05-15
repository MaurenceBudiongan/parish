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
        Schema::create('marriages', function (Blueprint $table) {
            $table->id();
            $table->string('marriage_id')->unique();
            $table->string('groom_name');
            $table->string('groom_fathername');
            $table->string('bride_name');
            $table->string('bride_fathername');
            $table->date('date');
            $table->string('priest');
            $table->string('first_witnessed')->nullable();
            $table->string('second_witnessed')->nullable();
            $table->string('third_witnessed')->nullable();
            $table->string('fourth_witnessed')->nullable();
            $table->string('fifth_witnessed')->nullable();
            $table->string('sixth_witnessed')->nullable();
            $table->string('seventh_witnessed')->nullable();
            $table->string('eighth_witnessed')->nullable();
             $table->string('place_issuance');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marriages');
    }
};
