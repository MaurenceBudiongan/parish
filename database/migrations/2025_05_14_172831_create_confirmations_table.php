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
        Schema::create('confirmations', function (Blueprint $table) {
                  $table->id();
            $table->string('confirmation_id')->unique();
            $table->string('child_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('excellency');
            $table->string('parish_name');
            $table->string('first_sponsor');
            $table->string('second_sponsor')->nullable();
            $table->string('purpose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmations');
    }
};
