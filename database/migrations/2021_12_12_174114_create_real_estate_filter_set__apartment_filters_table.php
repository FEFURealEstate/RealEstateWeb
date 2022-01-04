<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateFilterSetApartmentFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_filter_set__apartment_filters', function (Blueprint $table) {
            $table->float('min_area')->nullable();
            $table->float('max_area')->nullable();
            $table->integer('min_rooms')->nullable();
            $table->integer('max_rooms')->nullable();
            $table->integer('min_floor')->nullable();
            $table->integer('max_floor')->nullable();
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
        Schema::dropIfExists('real_estate_filter_set__apartment_filters');
    }
}
