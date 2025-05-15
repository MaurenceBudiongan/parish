<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaptismalsTable extends Migration
{
    public function up()
    {
        Schema::create('baptismals', function (Blueprint $table) {
            $table->id();
            $table->string('baptismal_id')->unique();
            $table->string('child_name');
            $table->date('date_birth');
            $table->string('place');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('parent_residence');
            $table->date('date_baptism');
            $table->string('minister');
            $table->string('sponsor');
            $table->text('purpose');
            $table->timestamps();
        });
}


    public function down()
    {
        Schema::dropIfExists('baptismals');
    }
}
