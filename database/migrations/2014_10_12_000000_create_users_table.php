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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->enum('gender', ['ຊາຍ','ຍິງ', 'ອື່ນໆ']);
            $table->date('date_of_birth');
            $table->string('address');
            $table->enum('role', ['admin', 'teacher', 'student']);
            $table->unsignedBigInteger('major_id');
            $table->integer('tel')->unique();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // $table->foreign('role')->references('role_name')->on('roles');
            // $table->foreign('major')->references('major_name')->on('majors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
