<?php

namespace App\Http\Controllers;

use App\Cabang;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::selectRaw('pegawais.*,cabang_id')
            ->leftjoin('users', 'pegawais.created_by', 'users.id')
            ->when(auth()->user()->hasRole('admin-cabang'), function ($q) {
                $q->where('cabang_id', auth()->user()->cabang_id);
            })->get();
        $cabang = Cabang::pluck('cabang', 'id');
        return view('pegawai.index', compact('data', 'cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['nip'] = $request->nip;
        $data['nama'] = $request->nama;
        $data['hp'] = $request->hp;
        $data['jabatan'] = $request->jabatan;
        $data['nama_seksi'] = $request->nama_seksi;
        $data['nama_bidang'] = $request->nama_bidang;
        $data['nama_dinas'] = $request->nama_dinas;

        if ($request->has('foto')) {
            $extension = $request->file('foto')->extension();
            $imgName = 'foto/' . date('dmh') . '-' . rand(1, 10) . '-' . $data['nama'] . '.' . $extension;
            $path = Storage::putFileAs('public', $request->file('foto'), $imgName);
            $data['foto'] = $path;
        }
        Pegawai::create($data);

        toastr()->success('Data Telah Tersimpan', 'success!');
        return redirect(action('PegawaiController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.detail', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['nip'] = $request->nip;
        $data['nama'] = $request->nama;
        $data['hp'] = $request->hp;
        $data['jabatan'] = $request->jabatan;
        $data['nama_seksi'] = $request->nama_seksi;
        $data['nama_bidang'] = $request->nama_bidang;
        $data['nama_dinas'] = $request->nama_dinas;

        if ($request->filled('foto')) {
            $extension = $request->file('foto')->extension();
            $imgName = 'foto/' . date('dmh') . '-' . rand(1, 10) . '-' . $data['nama'] . '.' . $extension;
            $path = Storage::putFileAs('public', $request->file('foto'), $imgName);
            $data['foto'] = $path;
        }
        Pegawai::where('id', $id)->update($data);

        toastr()->success('Data Telah Tersimpan', 'success!');
        return redirect(action('PegawaiController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        $result['code'] = '200';
        return response()->json($result);
    }
}
