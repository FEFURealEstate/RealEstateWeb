<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateSetHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_set__houses', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->float('total_area')->nullable();
            $table->integer('total_floors')->nullable();

            $table->foreign('id')
                ->references('id')
                ->on('real_estate_sets')
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
        Schema::dropIfExists('real_estate_set__houses');
    }
}
