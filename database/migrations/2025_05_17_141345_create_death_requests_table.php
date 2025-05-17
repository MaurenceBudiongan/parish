<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathRequestsTable extends Migration
{
    public function up(): void
    {
        Schema::create('death_requests', function (Blueprint $table) {
            $table->id();
              $table->string('deathrequest_id')->unique();
            $table->string('requester');
            $table->string('fullName');
            $table->string('deathDate');
            $table->string('deathPlace');
            $table->string('dobOrAge')->nullable();
            $table->string('parentsNames')->nullable();
            $table->string('spouseName')->nullable();
            $table->string('purpose');
            $table->string('contact');
            $table->string('relationship')->nullable();
            $table->string('idProof')->nullable();
            $table->string('status')->default('PENDING');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('death_requests');
    }
}

