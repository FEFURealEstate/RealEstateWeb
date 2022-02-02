<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateFilterSetHouseFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_filter_set__house_filters', function (Blueprint $table) {
            $table->integer('min_floors')->nullable();
            $table->integer('max_floors')->nullable();
            $table->float('min_area')->nullable();
            $table->float('max_area')->nullable();
            $table->integer('min_rooms')->nullable();
            $table->integer('max_rooms')->nullable();
            $table->bigInteger('id')->primary();

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
        Schema::dropIfExists('real_estate_filter_set__house_filters');
    }
}
