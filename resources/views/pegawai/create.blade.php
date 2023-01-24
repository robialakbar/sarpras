@extends('layouts.layout')
@section('css')
    <style type="text/css">
        .table {
            color: black !important;
            font-size: 11px;
        }

        .btn-xs {
            padding: 2px 2px;
            font-size: 11px;
            border-radius: 2px;
        }
    </style>
    {{-- <link href="{{ asset('vendor/datetimepicker/jquery.datetimepicker.min.css') }}" rel="stylesheet"> --}}
@endsection
@section('js')
    {{-- <script src="{{ asset('vendor/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script> --}}
@endsection
@section('heading-title')
    <div class="row">
        <div class="col-6">
            <h3>Tambah Data Pegawai</h3>
        </div>
        <div class="text-right col-6"><a href="{{ action('BarangController@index') }}" class="btn btn-warning">Kembali</a></div>
    </div>
@endsection
@section('content-new')
    <title>Tambah Data Pegawai</title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ action('PegawaiController@store') }}" method="POST" enctype='multipart/form-data' autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="nip" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="hp" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="jabatan" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Seksi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_seksi" required value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Bidang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="nama_bidang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Dinas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="nama_dinas" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="foto">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-12">Simpan</button>
                        {{-- 	protected $fillable = [ 'kode', 'kode_lokasi', 'tahun_anggaran', 'kode_barang', 'nomor_aset', 'subkelompok_barang', 'merk_type', 'tanggal_perolehan', 'rupiah_satuan', 'ruang', 'kondisi_barang', 'gambar', 'created_by', 'updated_by', 'deleted_by',        ]; --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
