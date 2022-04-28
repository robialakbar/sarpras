<?php

namespace App\Http\Controllers;

use Alert;
use App\Barang;
use App\BarangNew;
use App\Imports\BarangImport;
use App\Ruangan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use auth;

class BarangController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','Admin']);
	}


	public function index(Request $request)
	{
		$ruangan  = Ruangan::pluck('nama_ruangan','nama_ruangan');
		$tahun = BarangNew::groupBy('tahun_anggaran')->pluck('tahun_anggaran','tahun_anggaran');
		$data  = BarangNew::when($request->has('kode') && !empty($request->kode), function($q){
						$q->where('kode','like','%'.request()->kode.'%');
					})
					->when($request->has('ruang') && !empty($request->ruang), function($q){
						$q->where('ruang','like','%'.request()->ruang.'%');
					})					
					->when($request->has('tahun') && !empty($request->tahun), function($q){
						$q->where('tahun_anggaran','like','%'.request()->tahun.'%');
					})
					->paginate(10);

		return view('barang.view', compact('data','ruangan','tahun'));
	}

	public function create(Request $request)
	{

		$ruangan  = Ruangan::get();
		$kondisi  = ['Baik'=>'Baik','Rusak Ringan'=>'Rusak Ringan','Rusak Berat'=>'Rusak Berat',];
		return view('barang.create', compact('ruangan','kondisi'));
	}

	public function store(Request $request)
	{
		// dd($request->all());
		$data["kode"] = $request->kode_lokasi.$request->tahun_anggaran.$request->kode_barang.$request->nomor_aset;
		$data["kode_lokasi"] = $request->kode_lokasi;
		$data["tahun_anggaran"] = $request->tahun_anggaran;
		$data["kode_barang"] = $request->kode_barang;
		$data["nomor_aset"] = $request->nomor_aset;
		$data["subkelompok_barang"] = $request->subkelompok_barang;
		$data["merk_type"] = $request->merk_type;
		$data["tanggal_perolehan"] = $request->tanggal_perolehan;
		$data["rupiah_satuan"] = $request->rupiah_satuan;
		$data["ruang"] = $request->ruang;
		$data["kondisi_barang"] = $request->kondisi_barang;

		if ($request->has('gambar')) {
			$extension = $request->file('gambar')->extension();
			$imgName = 'gambar/' . date('dmh') . '-' .rand(1,10).'-'. $data['kode'] . '.' . $extension;
			$path = Storage::putFileAs('public', $request->file('gambar'), $imgName);
			$data['gambar'] = $path;
		}

		BarangNew::create($data);

		toastr()->success('Data Telah Terinput','success!');
		return redirect(action('BarangController@index'));
	}


	public function edit($id)
	{

		$data = BarangNew::find($id);
		$ruangan  = Ruangan::get();
			$kondisi  = ['Baik'=>'Baik','Rusak Ringan'=>'Rusak Ringan','Rusak Berat'=>'Rusak Berat',];

		return view('barang.edit', compact('data', 'ruangan', 'kondisi'));
	}


	public function qrcode($id)
	{

		$qrcode = DB::table('barangs')->where('id_barang', $id)->first();

		return view('barang.qrcode', compact('qrcode'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$data["kode"] = $request->kode_lokasi.$request->tahun_anggaran.$request->kode_barang.$request->nomor_aset;
		$data["kode_lokasi"] = $request->kode_lokasi;
		$data["tahun_anggaran"] = $request->tahun_anggaran;
		$data["kode_barang"] = $request->kode_barang;
		$data["nomor_aset"] = $request->nomor_aset;
		$data["subkelompok_barang"] = $request->subkelompok_barang;
		$data["merk_type"] = $request->merk_type;
		$data["tanggal_perolehan"] = $request->tanggal_perolehan;
		$data["rupiah_satuan"] = $request->rupiah_satuan;
		$data["ruang"] = $request->ruang;
		$data["kondisi_barang"] = $request->kondisi_barang;

		if ($request->has('gambar')) {
			$extension = $request->file('gambar')->extension();
			$imgName = 'gambar/' . date('dmh') . '-' .rand(1,10).'-'. $data['kode'] . '.' . $extension;
			$path = Storage::putFileAs('public', $request->file('gambar'), $imgName);
			$data['gambar'] = $path;
		}

		BarangNew::where('id', $id)->update($data);

		toastr()->success('Data Telah Terupdate','success!');
		return redirect(action('BarangController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	DB::table('barangs')->where('id_barang', $id)->delete();
    	Alert::success('Success', 'Data Telah Terhapus');	
    	return redirect()->route('barang.index');
    }

    public function import()
    {

    	return view('barang.import');
    }

    public function importStore(Request $request)
    {
    	Excel::import(new BarangImport(), $request->file('import_file'));
    	Alert::success('Success', 'Data Telah Terhapus');
    	return back();
    }

    public function show($id)
    {

    	$data = BarangNew::find($id);
    	$url = env('APP_URL') . '/scan-barcode/';
    	$qrcode = QrCode::size(200)->generate($url . $data->id);
    	return view('barang.detail', compact('data', 'qrcode'));
    }

    public function tambahRuang($id)
    {
    	$data = Ruangan::pluck('nama_ruangan','nama_ruangan');
    	$barang = BarangNew::find($id);
    	return view('barang.tambah_ruang', compact('data','barang'));
    }

     public function simpanRuang(Request $request, $id)
    {
    	BarangNew::where('id',$id)->update([
    		'ruang' => $request->ruang
    	]);
		toastr()->success('Data Telah Terupdate','success!');

    	return back();
    }

    public function destroy($id)
	{
		$data = BarangNew::find($id);
		$data->delete();
    	$result['code'] = '200';
    	return response()->json($result);
	}

}
