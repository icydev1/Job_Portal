<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowUnfollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_unfollows', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('follow_id')->nullable();
            $table->tinyInteger('user_id')->nullable();
            $table->tinyInteger('is_block')->default(0)->comment('0 => default, 1 => block');
            $table->tinyInteger('is_accept')->default(0)->comment('0 => pending, 1 => accept, 2 => reject');
            $table->tinyInteger('status')->default(0)->comment('0 => follow,1 => unfollow');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow_unfollows');
    }
}
