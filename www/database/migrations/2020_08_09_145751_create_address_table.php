<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cep');
            $table->string('patio');
            $table->string('neighborhood');
            $table->string('complemento')->nullable();
            $table->string('number');
            $table->string('city');
            $table->string('state');
            $table->integer('status');
            $table->unsignedBigInteger('id_client');
            $table->timestamps();

            $table->foreign('id_client')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
