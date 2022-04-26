<?php

namespace App\Imports;

use App\BarangNew;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BarangImport implements ToCollection, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // private $barang;

    // public function __construct()
    // {
    // 	$this->barang = BarangNew::select('kode')->get();
    // }

    public function transformDate($value, $format = 'Y-m-d')
    {
    	try {
    		return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    	} catch (\ErrorException $e) {
    		return \Carbon\Carbon::createFromFormat($format, $value);
    	}
    }

    public function collection(Collection $rows)
    {
    	// dd($rows->toArray(), );
    	$barang = BarangNew::pluck('kode')->toArray();
    	$user  = auth()->user()->id;
    	$now  = now()->toDateTimeString();

    	foreach ($rows->chunk(5000) as $key => $value) {
	    	$barangNew = [];
    		foreach ($value as $row) 
    		{
    			if(!in_array($row[0], $barang)){
    				$barangNew[] = [
    					'kode' => $row[0],
    					'kode_lokasi' => $row[1],
    					'tahun_anggaran' => $row[2],
    					'kode_barang' => $row[3],
    					'nomor_aset' => $row[4],
    					'subkelompok_barang' => $row[5],
    					'merk_type' => $row[6],
    					'tanggal_perolehan' => $row[7],
    					'rupiah_satuan' => $row[8],
    					'ruang' => $row[9],
    					'kondisi_barang' => $row[10],
    					'created_by' => $user,
    					'created_at' => $now,
    					'updated_at' => $now,
    				];
    			}
    		}
    		$chunks = array_chunk($barangNew, 2500);
	    	foreach ($chunks as $chunk) {
	    		BarangNew::insert($chunk);
	    	}
    	}

    	
    }

    public function startRow(): int
    {
    	return 1;
    }

//     public function model(array $row)
//     {
//     	// dd($this->transformDate($row[7]));
//     	return new BarangNew([
//     		'kode' => $row[0],
//     		'kode_lokasi' => $row[1],
//     		'tahun_anggaran' => $row[2],
//     		'kode_barang' => $row[3],
//     		'nomor_aset' => $row[4],
//     		'subkelompok_barang' => $row[5],
//     		'merk_type' => $row[6],
//     		'tanggal_perolehan' => $this->transformDate($row[7]),
//     		'rupiah_satuan' => $row[8],
//     		'ruang' => $row[9],
//     		'kondisi_barang' => $row[10],
// // 'gambar' => $row[],
// // 'created_by' => auth()=,
// // 'updated_by' => $row[],
// // 'deleted_by' => $row[],
//     	]);
//     }
}