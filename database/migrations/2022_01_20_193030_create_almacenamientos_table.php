<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacenamientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('computador_id')->unsigned();
            $table->string('tipo');
            $table->string('cantidad');
            $table->timestamps();

            $table->foreign('computador_id')->references('id')->on('computadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacenamientos');
    }
}
