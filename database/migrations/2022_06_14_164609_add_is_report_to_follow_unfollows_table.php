<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsReportToFollowUnfollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('follow_unfollows', function (Blueprint $table) {
            $table->tinyInteger('is_report')->default(0)->comment('0 => default, 1 => report');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('follow_unfollows', function (Blueprint $table) {
            $table->tinyInteger('is_report')->default(0)->comment('0 => default, 1 => report');
        });
    }
}
