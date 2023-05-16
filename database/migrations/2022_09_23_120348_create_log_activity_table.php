<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_activity', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->nullable()->constrained();
            $table->string('status_transaksi_lama');
            $table->string('status_transaksi_baru');
            $table->string('nama_kontrakan_lama');
            $table->string('nama_kontrakan_baru');
            $table->string('nama_penghuni_lama');
            $table->string('nama_penghuni_baru');
            $table->string('keterangan');
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
        Schema::dropIfExists('log_activity');
    }
}
