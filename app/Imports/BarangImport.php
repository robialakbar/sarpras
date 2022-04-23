<?php

namespace App\Imports;

use App\BarangNew;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDate($value, $format = 'Y-m-d')
    {
    	try {
    		return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    	} catch (\ErrorException $e) {
    		return \Carbon\Carbon::createFromFormat($format, $value);
    	}
    }

    public function model(array $row)
    {
    	// dd($this->transformDate($row[7]));
    	return new BarangNew([
    		'kode' => $row[0],
    		'kode_lokasi' => $row[1],
    		'tahun_anggaran' => $row[2],
    		'kode_barang' => $row[3],
    		'nomor_aset' => $row[4],
    		'subkelompok_barang' => $row[5],
    		'merk_type' => $row[6],
    		'tanggal_perolehan' => $this->transformDate($row[7]),
    		'rupiah_satuan' => $row[8],
    		'ruang' => $row[9],
    		'kondisi_barang' => $row[10],
// 'gambar' => $row[],
// 'created_by' => auth()=,
// 'updated_by' => $row[],
// 'deleted_by' => $row[],
    	]);
    }
}
