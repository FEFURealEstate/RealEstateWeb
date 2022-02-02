<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demand_sets', function (Blueprint $table) {
            $table->id();
            $table->text('address_city')->nullable();
            $table->text('address_street')->nullable();
            $table->text('address_house')->nullable();
            $table->text('address_number')->nullable();
            $table->bigInteger('min_price')->nullable();
            $table->bigInteger('max_price')->nullable();
            $table->bigInteger('agent_id')->nullable();
            $table->bigInteger('client_id');
            $table->bigInteger('real_estate_filter_id');

            $table->foreign('agent_id')
                ->references('id')
                ->on('person_set__agents')
                ->onDelete('cascade');

            $table->foreign('client_id')
                ->references('id')
                ->on('person_set__clients')
                ->onDelete('cascade');

            $table->foreign('real_estate_filter_id')
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
        Schema::dropIfExists('demand_sets');
    }
}
