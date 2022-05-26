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
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->string('image')->nullable();
            $table->string('country')->nullable();
            $table->string('position')->nullable();
            $table->string('education')->nullable();
            $table->string('state')->nullable();
            $table->longText('short_bio')->nullable();
            $table->longText('address')->nullable();
            $table->string('provider_id')->nullable();
            $table->tinyInteger('is_subscribe')->nullable();
            $table->tinyInteger('status')->default('0')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
