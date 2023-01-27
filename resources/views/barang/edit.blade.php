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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('vendor/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script type="text/javascript">
        $('.tanggal').datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
        });

        $('#pegawai').select2();
    </script>
@endsection
@section('heading-title')
    <div class="row">
        <div class="col-6">
            <h3>Edit Data Barang</h3>
        </div>
        <div class="text-right col-6"><a href="{{ action('BarangController@index') }}" class="btn btn-warning">Kembali</a></div>
    </div>
@endsection
@section('content-new')
    <title>Edit Data Barang</title>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ action('BarangController@update', $data->id) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_lokasi" required value="{{ $data->kode_lokasi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="{{ $data->tahun_anggaran }}" name="tahun_anggaran" required max="2030">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $data->kode_barang }}" name="kode_barang" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Aset</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $data->nomor_aset }}" name="nomor_aset" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Subkelompok Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subkelompok_barang" required value="{{ $data->subkelompok_barang }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Merk / Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $data->merk_type }}" name="merk_type">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Perolehan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control tanggal" value="{{ $data->tanggal_perolehan }}" name="tanggal_perolehan" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Rupiah Satuan</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="{{ $data->rupiah_satuan }}" name="rupiah_satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ruang</label>
                            <div class="col-sm-10">
                                <select class="custom-select my-1 mr-sm-2" name="ruang">
                                    <option>Pilih Ruangan</option>
                                    @foreach ($ruangan as $key => $val)
                                        <option value="{{ $val->id }}" {{ $val->id == $data->ruang ? 'selected' : '' }}>{{ $val->nama_ruangan }}</option>
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
                                        <option value="{{ $v }}" {{ $v == $data->kondisi_barang ? 'selected' : '' }}>{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pemegang Barang Barang</label>
                            <div class="col-sm-10">
                                <select class="custom-select my-1 mr-sm-2" name="pegawai_id" id="pegawai">
                                    <option selected>Pilih Pemegang Barang</option>
                                    @foreach ($pegawai as $k => $v)
                                        <option value="{{ $v->id }}" {{ $v->id == $data->pegawai_id ? 'selected' : '' }}>{{ $v->nip . ' ' . $v->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $data->keterangan }}" name="keterangan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" name="gambar">
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
