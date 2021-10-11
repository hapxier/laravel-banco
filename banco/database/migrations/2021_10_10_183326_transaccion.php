<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_tarjeta');
            $table->unsignedBigInteger('id_operacion');
            // $table->unsignedBigInteger('id_tipo');
            $table->dateTime('fecha_transaccion');
            $table->string('num_cuenta_destino', 25);
            $table->decimal('monto',11,2);
            $table->timestamps();

            // $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_tarjeta')->references('id')->on('tarjetas');
            $table->foreign('id_operacion')->references('id')->on('operaciones');
            // $table->foreign('id_tipo')->references('id')->on('tipo_cuentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
