<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_page_settings', function (Blueprint $table) {
            $table->id();
             $table->string('site_name')->nullable();
             $table->tinyInteger('site_max_length')->nullable()->default(20);
             $table->tinyInteger('site_min_length')->nullable()->default(0);
             $table->string('post_page_name')->nullable();
             $table->string('company_name')->nullable();
             $table->string('company_name_place')->nullable();
             $table->tinyInteger('comp_name_max_length')->nullable()->default(50);
             $table->tinyInteger('comp_name_min_length')->nullable()->default(0);
             $table->string('company_email')->nullable();
             $table->string('company_email_place')->nullable();
             $table->tinyInteger('comp_email_max_length')->nullable()->default(50);
             $table->tinyInteger('comp_email_min_length')->nullable()->default(0);
             $table->string('company_detail')->nullable();
             $table->string('company_detail_place')->nullable();
             $table->tinyInteger('comp_detail_max_length')->nullable()->default(50);
             $table->tinyInteger('comp_detail_min_length')->nullable()->default(0);
             $table->string('job_name')->nullable();
             $table->string('job_place')->nullable();
             $table->tinyInteger('job_max_length')->nullable()->default(50);
             $table->tinyInteger('job_min_length')->nullable()->default(0);
             $table->string('desc_name')->nullable();
             $table->string('desc_place')->nullable();
             $table->tinyInteger('desc_max_length')->nullable()->default(100);
             $table->tinyInteger('desc_min_length')->nullable()->default(0);
             $table->string('location_name')->nullable();
             $table->string('location_place')->nullable();
             $table->tinyInteger('location_max_length')->nullable()->default(50);
             $table->tinyInteger('location_min_length')->nullable()->default(0);
             $table->string('salary_name')->nullable();
             $table->string('exp_name')->nullable();
             $table->string('qual_name')->nullable();
             $table->string('responsibility_name')->nullable();
             $table->string('responsibility_place')->nullable();
             $table->string('responsibility_list_name')->nullable();
             $table->string('responsibility_list_place')->nullable();
             $table->string('responsibility_add_btn')->nullable();
             $table->tinyInteger('responsibility_max_length')->nullable()->default(100);
             $table->tinyInteger('responsibility_min_length')->nullable()->default(0);
             $table->tinyInteger('responsibility_list_max_length')->nullable()->default(50);
             $table->tinyInteger('responsibility_list_min_length')->nullable()->default(0);
             $table->string('qualification_name')->nullable();
             $table->string('qualification_place')->nullable();
             $table->string('qualification_list_name')->nullable();
             $table->string('qualification_list_place')->nullable();
             $table->string('qualification_add_btn')->nullable();
             $table->tinyInteger('qualification_max_length')->nullable()->default(100);
             $table->tinyInteger('qualification_min_length')->nullable()->default(0);
             $table->tinyInteger('qualification_list_max_length')->nullable()->default(50);
             $table->tinyInteger('qualification_list_min_length')->nullable()->default(0);
             $table->string('benefits_name')->nullable();
             $table->string('benefits_place')->nullable();
             $table->string('benefits_list_name')->nullable();
             $table->string('benefits_list_place')->nullable();
             $table->string('benefits_add_btn')->nullable();
             $table->tinyInteger('benefits_max_length')->nullable()->default(100);
             $table->tinyInteger('benefits_min_length')->nullable()->default(0);
             $table->tinyInteger('benefits_list_max_length')->nullable()->default(50);
             $table->tinyInteger('benefits_list_min_length')->nullable()->default(0);
             $table->string('job_vacancy_name')->nullable();
             $table->string('job_vacancy_place')->nullable();
             $table->tinyInteger('vacancy_max_length')->nullable()->default(50);
             $table->tinyInteger('vacancy_min_length')->nullable()->default(0);
             $table->string('job_duration_name')->nullable();
             $table->string('job_shift_name')->nullable();
             $table->string('job_cat_name')->nullable();
             $table->string('job_comp_place')->nullable();
             $table->string('job_post_name_btn')->nullable();
             $table->tinyInteger('user_id')->nullable();
             $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('job_page_settings');
    }
}
