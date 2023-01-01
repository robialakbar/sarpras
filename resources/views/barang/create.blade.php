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
    <link href="{{ asset('vendor/datetimepicker/jquery.datetimepicker.min.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="{{ asset('vendor/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script type="text/javascript">
        $('.tanggal').datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
        });
    </script>
@endsection
@section('heading-title')
    <div class="row">
        <div class="col-6">
            <h3>Tambah Data Barang</h3>
        </div>
        <div class="text-right col-6"><a href="{{ action('BarangController@index') }}" class="btn btn-warning">Kembali</a></div>
    </div>
@endsection
@section('content-new')
    <title>Tambah Data Barang</title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ action('BarangController@store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="kode_lokasi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="" name="tahun_anggaran" required max="2030">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="kode_barang" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Aset</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="nomor_aset" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Subkelompok Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subkelompok_barang" required value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Merk / Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="merk_type">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Perolehan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control tanggal" value="" name="tanggal_perolehan" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Rupiah Satuan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="" name="rupiah_satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ruang</label>
                            <div class="col-sm-10">
                                <select class="custom-select my-1 mr-sm-2" name="ruang">
                                    <option>Pilih Ruangan</option>
                                    @foreach ($ruangan as $key => $val)
                                        <option value="{{ $val->id }}">{{ $val->nama_ruangan }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kondisi Barang</label>
                            <div class="col-sm-10">
                                <select class="custom-select my-1 mr-sm-2" name="kondisi_barang">
                                    <option selected>Pilih Kondisi Barang</option>
                                    @foreach ($kondisi as $k => $v)
                                        <option value="{{ $v }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="gambar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="keterangan">
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
