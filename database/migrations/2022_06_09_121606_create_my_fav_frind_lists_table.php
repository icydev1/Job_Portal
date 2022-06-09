<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyFavFrindListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_fav_frind_lists', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('fav_friend_id')->nullable();
            $table->tinyInteger('is_block')->default(0)->comment('0 => default, 1 => block');
            $table->tinyInteger('is_online')->default(0)->comment('0 => offline, 1 => online');
            $table->tinyInteger('is_accept')->default(0)->comment('0 => pending, 1 => accept, 2 => reject');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('my_fav_frind_lists');
    }
}
