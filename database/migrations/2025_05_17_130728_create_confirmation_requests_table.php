<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationRequestsTable extends Migration
{
    public function up(): void
    {
        Schema::create('confirmation_requests', function (Blueprint $table) {
            $table->id();
              $table->string('confirmationrequest_id')->unique();
            $table->string('requester');
            $table->string('confirmedName');
            $table->date('dob');
            $table->string('confirmationDate');
            $table->string('confirmationPlace');
            $table->string('parentsNames')->nullable();
            $table->string('sponsorName')->nullable();
            $table->string('reason');
            $table->string('contact');
            $table->string('relationship')->nullable();
            $table->string('idProof')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('confirmation_requests');
    }
}
