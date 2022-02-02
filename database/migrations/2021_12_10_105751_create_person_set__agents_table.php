<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonSetAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_set__agents', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->integer('deal_share')->default(45);

            $table->foreign('id')
                ->references('id')
                ->on('person_sets')
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
        Schema::dropIfExists('person_set__agents');
    }
}
