<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'customers';

protected $fillable = [

    'nama',
    'jabatan',
    'perusahaan',
    'tanggal_lahir',
];
}