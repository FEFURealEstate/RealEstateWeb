<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotFinishDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_finish_deals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('demand_id');
            $table->bigInteger('supply_id');

            $table->foreign('demand_id')
                ->references('id')
                ->on('demand_sets')
                ->onDelete('cascade');

            $table->foreign('supply_id')
                ->references('id')
                ->on('supply_sets')
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
        Schema::dropIfExists('not_finish_deals');
    }
}
