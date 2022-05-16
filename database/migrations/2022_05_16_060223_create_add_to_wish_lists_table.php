<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddToWishListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_to_wish_lists', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('fav_job_id')->nullable();
            $table->tinyInteger('job_cat_id')->nullable();
            $table->tinyInteger('job_shift_id')->nullable();
            $table->tinyInteger('user_id')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('add_to_wish_lists');
    }
}
