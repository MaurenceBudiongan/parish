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
        Schema::create('deaths', function (Blueprint $table) {
              $table->id();
               $table->string('death_id')->unique();
            $table->string('deceased_name');
            $table->string('residence');
            $table->string('age');
            $table->string('cause');
            $table->string('death_time');
            $table->string('place');
            $table->string('burial_time');
            $table->string('guardian');
            $table->string('priest');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('rectory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deaths');
    }
};
