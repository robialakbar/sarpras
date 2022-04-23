<?php

namespace App\Http\Controllers;

use Alert;
use App\Kategori;
use DB;
use Illuminate\Http\Request;
use auth;

class KategoriController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }

    public function index()
    {
		$data = Kategori::get();
    	return view('kategori.view',compact('data'));
 
    }

    // method untuk insert data ke table jenis
	public function store(Request $request)
	{
		Kategori::create($request->all());

		// alihkan halaman ke halaman jenis
		Alert::success('Success', 'Data Telah Terinput');
		return redirect(action('KategoriController@index'));
	 
	}

	// method untuk edit data pegawai
	public function edit($id)
	{
		$data = Kategori::find($id);
		return view('kategori.edit',compact('data'));
	 
	}

	// update data jenis
	public function update(Request $request, $id)
	{

		Kategori::whereId($id)->update([
			'kode_kategori' => $request->kode_kategori,
			'nama_kategori' => $request->nama_kategori,
		]);

		// alihkan halaman ke halaman jenis
		Alert::success('Success', 'Data Telah Terupdate');
			return redirect(action('KategoriController@index'));
	}

	public function destroy($id)
	{

		$data = Kategori::find($id);
		$data->delete();
    	$result['code'] = '200';
    	return response()->json($result);
	}
}
