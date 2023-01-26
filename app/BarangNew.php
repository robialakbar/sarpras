<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class BarangNew extends Model
{
    use Userstamps, SoftDeletes;

    protected $with = ['Ruangan'];

    protected $fillable = ['kode', 'kode_lokasi', 'tahun_anggaran', 'kode_barang', 'nomor_aset', 'subkelompok_barang', 'merk_type', 'tanggal_perolehan', 'rupiah_satuan', 'ruang', 'kondisi_barang', 'keterangan', 'pegawai_id', 'gambar', 'created_by', 'updated_by', 'deleted_by',];

    public function Ruangan()
    {
        return $this->belongsTo(Ruangan::class,  'ruang', 'id');
    }

    public function Pegawai()
    {
        return $this->belongsTo(Pegawai::class,  'pegawai_id', 'id');
    }
}
