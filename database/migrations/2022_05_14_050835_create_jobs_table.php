<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_deatil')->nullable();
            $table->string('job_name')->nullable();
            $table->string('job_location')->nullable();
            $table->string('job_salary')->nullable();
            $table->string('job_description')->nullable();
            $table->string('job_responsibility')->nullable();
            $table->string('job_qualification')->nullable();
            $table->tinyInteger('job_shift_id')->nullable();
            $table->tinyInteger('job_vacancy')->nullable();
            $table->string('job_end_date')->nullable();
            $table->string('job_category_id')->nullable();
            $table->tinyInteger('user_id')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
