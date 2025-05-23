<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_admin_forms_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminFormsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_forms', function (Blueprint $table) {
            $table->id();
            $table->string('adminfullname');
            $table->string('admin');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_forms');
    }
}
