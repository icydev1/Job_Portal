<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_job_posts', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('apply_job_id')->nullable();
            $table->tinyInteger('job_cat_id')->nullable();
            $table->tinyInteger('job_shift_id')->nullable();
            $table->tinyInteger('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('portfolio_website_link')->nullable();
            $table->string('cover_letter')->nullable();
            $table->string('user_resume')->nullable();
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
        Schema::dropIfExists('apply_job_posts');
    }
}
