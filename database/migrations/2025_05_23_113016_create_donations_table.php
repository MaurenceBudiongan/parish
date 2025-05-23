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
            Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->string('donation_id')->unique();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('good')->nullable();
            $table->string('donation_type');
            $table->date('donation_date');
            $table->string('payment_method')->nullable();
            $table->string('reference_no')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('parishioners')->onDelete('cascade');
            });

    }

            /**
                 * Reverse the migrations.
                 */
            public function down():void
            {
            Schema::dropIfExists('donations');
            }
};