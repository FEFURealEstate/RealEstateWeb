<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateSetApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_set__apartments', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->float('total_area')->nullable();
            $table->integer('rooms')->nullable();
            $table->integer('floor')->nullable();

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
        Schema::dropIfExists('real_estate_set__apartments');
    }
}
