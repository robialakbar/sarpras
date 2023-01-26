<?php

namespace App\Http\Controllers;

use Alert;
use App\Cabang;
use App\Ruangan;
use DB;
use Illuminate\Http\Request;
use auth;

class RuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'Admin']);
    }

    public function index()
    {

        $data = Ruangan::selectRaw('ruangans.*,cabang_id')
            ->leftjoin('users', 'ruangans.created_by', 'users.id')
            ->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
                $q->where('cabang_id', auth()->user()->cabang_id);
            })->get();
        $cabang = Cabang::pluck('cabang', 'id');
        // mengirim data jenis ke view index
        return view('ruangan.view', compact('data', 'cabang'));
    }

    // method untuk insert data ke table jenis
    public function store(Request $request)
    {
        // insert data ke table jenis
        Ruangan::create($request->all());
        // alihkan halaman ke halaman jenis
        toastr()->success('Data Telah Terinput', 'success!');
        return redirect(action('RuanganController@index'));
    }

    // method untuk edit data pegawai
    public function edit($id)
    {

        $data = Ruangan::find($id);

        return view('ruangan.edit', compact('data'));
    }

    // update data jenis
    public function update(Request $request, $id)
    {

        Ruangan::whereId($id)->update([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
        ]);
        // alihkan halaman ke halaman jenis

        toastr()->success('Data Telah Terupdate', 'success!');
        return redirect(action('RuanganController@index'));
    }

    public function destroy($id)
    {
        $data = Ruangan::find($id);
        $data->delete();
        $result['code'] = '200';
        return response()->json($result);
    }
}
