<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penghuni extends Model
{
    protected $table = "occupants";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "nama_penghuni", 
        "agama_penghuni", 
        "umur_penghuni", 
        "jenis_kelamin_penghuni", 
        "status_penghuni",
        "foto_ktp"
    ]; 

    public function transaction()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function logs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
