<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_exps', function (Blueprint $table) {
            $table->id();
            $table->string('company_image')->nullable();
            $table->tinyInteger('profile_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_position')->nullable();
            $table->string('company_from')->nullable();
            $table->string('company_to')->nullable();
            $table->tinyInteger('user_id')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
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
        Schema::dropIfExists('user_exps');
    }
}
