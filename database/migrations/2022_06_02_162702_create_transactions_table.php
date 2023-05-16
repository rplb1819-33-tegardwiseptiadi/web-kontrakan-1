<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('occupant_id')->constrained();
            $table->foreignId('rent_id')->constrained();
            $table->date('tgl_transaksi');
            $table->integer('nominal');
            $table->enum('status_transaksi', ['Lunas', 'Belum Lunas']);
            $table->string('foto_transaksi');
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
        Schema::dropIfExists('transactions');
    }   
}
