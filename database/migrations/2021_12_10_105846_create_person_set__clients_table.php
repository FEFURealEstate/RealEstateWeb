<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonSetClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_set__clients', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->text('email');
            $table->string('phone', 11);

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
        Schema::dropIfExists('person_set__clients');
    }
}
