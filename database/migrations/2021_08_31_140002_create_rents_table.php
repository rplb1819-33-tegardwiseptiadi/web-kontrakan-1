<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kontrakan');
            $table->enum('tipe_kontrakan', ['Keluarga', 'Cowo', 'Cewe']);
            $table->integer('kapasitas_kontrakan');
            $table->integer('harga_kontrakan');
            $table->string('foto_kontrakan');
            $table->enum('status_kontrakan', ['Kosong', 'Penuh', 'Booked', 'Terjual']);
            $table->text('alamat_kontrakan');
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
        Schema::dropIfExists('rents');
    }
}
