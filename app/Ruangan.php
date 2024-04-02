<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Ruangan extends Model
{
    use Userstamps, SoftDeletes;

    protected $fillable = ['kode_ruangan', 'nama_ruangan', 'created_by', 'updated_by', 'deleted_by',];

    public function Barangs()
    {
        return $this->hasMany(BarangNew::class,'ruang','id');
    }
}
