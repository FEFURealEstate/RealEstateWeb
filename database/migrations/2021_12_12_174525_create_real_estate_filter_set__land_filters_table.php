<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateFilterSetLandFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_filter_set__land_filters', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->float('min_area');
            $table->float('max_area');

            $table->foreign('id')
                ->references('id')
                ->on('real_estate_filter_sets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate_filter_set__land_filters');
    }
}
