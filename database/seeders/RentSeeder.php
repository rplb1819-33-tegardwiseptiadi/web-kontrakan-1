<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("rents")->insert([
            [
                "nama_kontrakan" => "Kontrakan 1",
                "tipe_kontrakan" => "Keluarga",
                "kapasitas_kontrakan" => "3",
                "harga_kontrakan" => 1000000,
                "foto_kontrakan" => "",
                "status_kontrakan" => "Kosong",
                "alamat_kontrakan" => "Jl. Fajar Asri 7"
            ],
            [
                "nama_kontrakan" => "Kontrakan 2",
                "tipe_kontrakan" => "Cowo",
                "kapasitas_kontrakan" => "4",
                "harga_kontrakan" => 1500000,
                "foto_kontrakan" => "",
                "status_kontrakan" => "Kosong",
                "alamat_kontrakan" => "Jl. Fajar Asri 8"
            ],
            [
                "nama_kontrakan" => "Kontrakan 3",
                "tipe_kontrakan" => "Cewe",
                "kapasitas_kontrakan" => "2",
                "harga_kontrakan" => 2000000,
                "foto_kontrakan" => "",
                "status_kontrakan" => "Kosong",
                "alamat_kontrakan" => "Jl. Fajar Asri 9"
            ],
            [
                "nama_kontrakan" => "Kontrakan 4",
                "tipe_kontrakan" => "Keluarga",
                "kapasitas_kontrakan" => "2",
                "harga_kontrakan" => 1800000,
                "foto_kontrakan" => "",
                "status_kontrakan" => "Kosong",
                "alamat_kontrakan" => "Jl. Fajar Asri 10"
            ],
        ]);
    }
}
