<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Setting the creation of foreing keys for Users table
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->after('remember_token');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    //Setting the creation of foreing keys for Dishes table
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }
}
