<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_estate_sets', function (Blueprint $table) {
            $table->id();
            $table->text('address_city')->nullable();
            $table->text('address_street')->nullable();
            $table->text('address_house')->nullable();
            $table->text('address_number')->nullable();
            $table->float('coordinate_latitude')->nullable();
            $table->float('coordinate_longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('real_estate_sets');
    }
}
