<?php

namespace App\Http\Controllers;

use Alert;
use App\Barang;
use App\BarangNew;
use App\Imports\BarangImport;
use App\Ruangan;
use DB;
use Illuminate\Http\Request;
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

		$data  = BarangNew::paginate(10);

		return view('barang.view', compact('data'));
	}

	public function create(Request $request)
	{

		$ruangan  = Ruangan::get();
		$kondisi  = ['baik'=>'baik','rusak'=>'rusak'];
		return view('barang.create', compact('ruangan','kondisi'));
	}

	public function store(Request $request)
	{
		dd($request);
		DB::table('barangs')->insert([
			'id_barang' => $request->id_barang,
			'kategori_id'=>$request->kategori_id,
			'nama_barang' =>  $request->nama_barang,
			'satuan' =>  $request->satuan,
			'jumlah' => $request->jumlah,
		]);
		Alert::success('Success', 'Data Telah Terinput');
		return redirect()->back();
	}


	public function edit($id)
	{

		$barang2 = DB::table('barangs')->where('id_barang', $id)->first();
		$barang = DB::table('barangs')->get();
		$kategori = DB::table('kategori')->get();



		return view('barang.edit', compact('barang', 'barang2','kategori'));
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
    public function update(Request $request)
    {
    	DB::table('input_ruangan')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('keluar')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('keranjang_keluar')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('keranjang_masuk')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('keranjang_peminjaman')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('keranjang_ruangan')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('masuk')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('peminjaman')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    	]);
    	DB::table('keranjang_rusak_luar')->where('id_barang_rusak_luar', $request->id)->update([
    		'id_barang_rusak_luar' => $request->id_barang,
    	]);
    	DB::table('keranjang_rusak_ruangan')->where('id_barang_rusak', $request->id)->update([
    		'id_barang_rusak' => $request->id_barang,
    	]);
    	DB::table('rusak_luar')->where('id_barang_rusak_luar', $request->id)->update([
    		'id_barang_rusak_luar' => $request->id_barang,
    	]);
    	DB::table('rusak_ruangan')->where('id_barang_rusak', $request->id)->update([
    		'id_barang_rusak' => $request->id_barang,
    	]);

    	DB::table('barangs')->where('id_barang', $request->id)->update([
    		'id_barang' => $request->id_barang,
    		'kategori_id'=>$request->kategori_id,
    		'nama_barang' => $request->nama_barang,
    		'satuan' => $request->satuan,
    		'jumlah' => $request->jumlah
    	]);
        // alihkan halaman ke halaman pegawai
    	Alert::success('Success', 'Data Telah Terupdate');
    	return redirect('/barang');
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

    	return 'success';
    }

    public function show($id)
    {

    	$data = BarangNew::find($id);
    	$url = env('APP_URL') . '/scan-barcode/';
    	$qrcode = QrCode::size(200)->generate($url . $data->id);
    	return view('barang.detail', compact('data', 'qrcode'));
    }
}
