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
            <h3>Edit Cabang</h3>
        </div>
        <div class="text-right col-6"><a href="{{ action('CabangController@index') }}" class="btn btn-warning">Kembali</a></div>
    </div>
@endsection
@section('content-new')
    <title>Edit Cabang</title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ action('CabangController@update', $data->id) }}" method="POST" enctype='multipart/form-data' autocomplete="off">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Cabang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $data->cabang }}" name="cabang" required>
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
