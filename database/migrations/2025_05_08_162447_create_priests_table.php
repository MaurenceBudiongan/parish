<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('priests', function (Blueprint $table) {
            $table->id();
            $table->string('priest_id')->nullable()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->text('address');
            $table->date('date_of_birth');
            $table->date('ordination_date');
            $table->string('assigned_parish');
            $table->string('position');
            $table->string('profile_photo')->nullable();
            $table->enum('status', ['Active', 'Retired', 'On Leave'])->default('Active');
            $table->timestamps();
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('priests');
    }
};
