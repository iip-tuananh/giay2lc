<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleEnToConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configs', function (Blueprint $table) {
            $table->string('web_title_en')->nullable();
            $table->string('short_name_company_en')->nullable();
            $table->string('address_company_en')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('address_center_insurance_en')->nullable();
            $table->text('text_top_header_en')->nullable();
            $table->longText('web_des_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configs', function (Blueprint $table) {
            //
        });
    }
}
