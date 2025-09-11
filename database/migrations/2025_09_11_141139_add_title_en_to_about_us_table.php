<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleEnToAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('home_title_en')->nullable();
            $table->text('home_description_en')->nullable();

            $table->string('home_why_choose_title_en')->nullable();
            $table->text('home_why_choose_description_en')->nullable();

            $table->string('youtube_link_en')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('mission_en')->nullable();
            $table->longText('vision_en')->nullable();
            $table->longText('core_values_en')->nullable();

        });

        Schema::table('about_us_why_choose_criterias', function (Blueprint $table) {
            $table->string('title_en')->nullable();
            $table->text('content_en')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            //
        });
    }
}
