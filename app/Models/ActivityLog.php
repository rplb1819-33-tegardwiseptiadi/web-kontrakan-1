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

    public function transactions(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'transaction_id');
    }

    public function occupants(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Penghuni::class, 'occupant_id');
    }

    public function rents(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Kontrakan::class, 'rent_id');
    }

}
