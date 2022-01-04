<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplySetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_sets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('price');
            $table->bigInteger('agent_id')->nullable();
            $table->bigInteger('client_id');
            $table->bigInteger('real_estate_id');

            $table->foreign('agent_id')
                ->references('id')
                ->on('person_set__agents')
                ->onDelete('cascade');

            $table->foreign('client_id')
                ->references('id')
                ->on('person_set__clients')
                ->onDelete('cascade');

            $table->foreign('real_estate_id')
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
        Schema::dropIfExists('supply_sets');
    }
}
