<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'hp',
        'jabatan',
        'foto',
        'nama_seksi',
        'nama_bidang',
        'nama_dinas',
    ];
}
