<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarriageRequestsTable extends Migration
{
    public function up(): void
    {
        Schema::create('marriage_requests', function (Blueprint $table) {
            $table->id();
              $table->string('marriagerequest_id')->unique();
            $table->string('requester');
            $table->string('spouse1');
            $table->string('spouse2');
            $table->date('marriageDate');
            $table->string('marriagePlace');
            $table->string('officiant')->nullable();
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
        Schema::dropIfExists('marriage_requests');
    }
}
