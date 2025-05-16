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
        Schema::create('parishioners', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->date('dateofbirth');
            $table->string('gender');
            $table->string('contactnumber');
            $table->string('civil_status');
            $table->string('image')->nullable(); // <- added image column here
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('zipcode');
            $table->string('baptized');
            $table->date('baptism_date')->nullable();
            $table->string('baptism_church')->nullable();
            $table->string('confirmed');
            $table->enum('status', ['active', 'inactive', 'new'])->default('new');
            $table->timestamps(); 

        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parishioners');
    }
};
