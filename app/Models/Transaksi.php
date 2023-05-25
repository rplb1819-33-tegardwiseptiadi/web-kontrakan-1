<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "occupant_id",
        "rent_id",
        "tgl_transaksi",
        "nominal",
        "status_transaksi",
        "foto_transaksi",
        "jml_bulan",
        "total_harga",
    ];

    public function logs()
    {
        return $this->hasMany(ActivityLog::class);
    }
    public function occupants()
    {
        return $this->belongsTo(Penghuni::class, 'occupant_id');
    }
    public function rents()
    {
        return $this->belongsTo(Kontrakan::class, 'rent_id');
    }

}
