<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->enum('role', ['admin', 'teacher', 'student'])->primary();
            $table->enum('manage_blogs', ['all', 'wrote', 'none']);
            $table->enum('manage_schedules', ['all', 'empty', 'none']);
            $table->boolean('manage_user_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
