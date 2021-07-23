<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreareTypeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_user', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_user', function (Blueprint $table) {
            $table->dropForeign('type_user_type_id_foreign');
            $table->dropForeign('type_user_user_id_foreign');
        });
        Schema::dropIfExists('type_user');
    }
}
