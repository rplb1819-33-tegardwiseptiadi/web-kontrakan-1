<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupants', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penghuni');
            $table->enum('agama_penghuni', ['Islam', 'Protestan', 'Katolik', 'Buddha', 'Khonghucu']);
            $table->integer('umur_penghuni'); 
            $table->enum('jenis_kelamin_penghuni', ['Laki-Laki', 'Perempuan']);
            $table->enum('status_penghuni', ["Pegawai Swasta", "Karyawan Pabrik", "Guru", "Ojek Online", "Lain Sebagainya"]);
            $table->string('foto_ktp');
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
        Schema::dropIfExists('occupants');
    }
}
