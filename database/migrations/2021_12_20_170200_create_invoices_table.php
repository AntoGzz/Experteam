<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Establecimiento',3);
            $table->string('PuntoEmision',3);
            $table->integer('Secuencial');
            $table->dateTime('FechaEmision');
            $table->decimal('Subtotal', $precision = 18, $scale = 2);
            $table->decimal('Impuesto', $precision = 18, $scale = 2);
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
        Schema::dropIfExists('invoices');
    }
}
