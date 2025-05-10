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
  Schema::create('priest_assignments', function (Blueprint $table) {
    $table->id();
    $table->string('priest_id');
    $table->foreign('priest_id')->references('priest_id')->on('priests')->onDelete('cascade');
    $table->string('assignment_type');
    $table->string('assignment_title');
    $table->string('location');
    $table->date('start_date');
    $table->date('end_date')->nullable();
    $table->string('status')->default('Active');
    $table->string('assigned_by');
    $table->text('remarks')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priest_assignments');
    }
};
