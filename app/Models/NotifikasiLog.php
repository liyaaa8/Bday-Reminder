<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotifikasiLog extends Model
{
    protected $table = 'notifikasi_logs';

    protected $fillable = [
        'nasabah_id',
        'penerima_notifikasi_id',
        'status',
        'message',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }

    public function receiver()
    {
        return $this->belongsTo(
            NotificationReceiver::class,
            'penerima_notifikasi_id'
        );
    }
}