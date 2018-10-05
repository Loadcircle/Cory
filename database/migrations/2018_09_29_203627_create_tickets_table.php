<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('lastname');
            $table->string('rut');
            $table->string('email');
            $table->string('phone');
            $table->string('ticket_number');
            $table->string('local_val')->unique();
            $table->string('consume')->nullable();
            $table->integer('locals_id')->unsigned();

            $table->timestamps();

            //Relation
            $table->foreign('locals_id')->references('id')->on('locals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
