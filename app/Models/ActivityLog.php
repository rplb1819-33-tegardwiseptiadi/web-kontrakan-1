<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class ActivityLog extends Model
{
    protected $table = "log_activity";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "transaction_id",
        "status_transaksi_lama",
        "status_transaksi_baru",
        "nama_kontrakan_lama",
        "nama_kontrakan_baru",
        "nama_penghuni_lama",
        "nama_penghuni_baru", 
        "keterangan"
    ]; 

    public function transactions()
    {
        return $this->belongsTo('\App\Transaksi', 'transaction_id');
    }
    public function occupants()
    {
        return $this->belongsTo('\App\Penghuni', 'occupant_id');
    }
    public function rents()
    {
        return $this->belongsTo('\App\Kontrakan', 'rent_id');
    }

}
