<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NumeroGuia',10);
            $table->dateTime('FechaEnvio');
            $table->string('PaisOrigen',100);
            $table->string('NombreRemitente',100);
            $table->string('DireccionRemitente',100);
            $table->string('TelefonoRemitente',50)->nullable();
            $table->string('EmailRemitente',50)->nullable();
            $table->string('PaisDestino',100);
            $table->string('NombreDestinatario',100);
            $table->string('DireccionDestinatario',100);
            $table->string('TelefonoDestinatario',50)->nullable();
            $table->string('EmailDestinatario',50)->nullable();
            $table->decimal('Total', $precision = 18, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guides');
    }
}
