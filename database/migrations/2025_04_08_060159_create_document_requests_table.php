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
    Schema::create('document_requests', function (Blueprint $table) {
        $table->id();
        $table->string('request_id')->unique();
        $table->string('firstname');
        $table->string('lastname');
        $table->date('dateofbirth');
        $table->string('streetaddress');
        $table->string('city');
        $table->string('state');
        $table->string('zip');
        $table->string('email');
        $table->string('phonenumber');
        $table->string('documenttype');
        $table->text('reason');
        $table->string('status')->default('PENDING');
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_requests');
    }
};