<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_user', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('upvote')->default(0);
            $table->boolean('downvote')->default(0);

            $table->index('blog_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_user');
    }
}
