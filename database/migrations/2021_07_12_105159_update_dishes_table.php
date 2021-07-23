<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Setting the creation of foreing keys for Dishes table
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('visibility');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('category_id')->after('visibility')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('type_id')->after('category_id');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //Setting the cancellation of foreing keys for Dishes table
    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_user_id_foreign');
            $table->dropForeign('dishes_category_id_foreign');
            $table->dropForeign('dishes_type_id_foreign');
            $table->dropColumn('category_id');
            $table->dropColumn('user_id');
            $table->dropColumn('type_id');
        });
    }
}
