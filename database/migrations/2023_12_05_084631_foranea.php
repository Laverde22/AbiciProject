<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToModelHasRolesTable extends Migration
{
    public function up()
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->foreign('model_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            $table->dropForeign(['model_id']);
        });
    }
}

