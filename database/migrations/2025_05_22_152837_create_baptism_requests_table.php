<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaptismRequestsTable extends Migration
{
    public function up(): void
    {
        Schema::create('baptism_requests', function (Blueprint $table) {
            $table->id();
            $table->string('baptismrequest_id')->unique();
            $table->string('requester');
            $table->string('childName');
            $table->date('dob');
            $table->string('baptismDate');
            $table->string('baptismPlace');
            $table->string('parentsNames');
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
        Schema::dropIfExists('baptism_requests');
    }
}
