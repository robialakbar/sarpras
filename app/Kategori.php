<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Kategori extends Model
{
     use Userstamps;
	 
    protected $fillable = [ 'kode_kategori', 'nama_kategori', 'created_by', 'updated_by', 'deleted_by', ];
}
