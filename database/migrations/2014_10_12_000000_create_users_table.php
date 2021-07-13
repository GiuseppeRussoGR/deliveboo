<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Setting the creation of Users Table Columns
    public function up()
    {   
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('company_name', 50);
            $table->string('address', 100);
            $table->string('city', 50);
            $table->string('p_iva', 11)->unique();
            $table->string('img_path', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //Setting the cancellation of Users Table
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
