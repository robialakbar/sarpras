@extends('layouts.layout')
@section('js')
@endsection
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
@endsection
@section('heading-title')
    <div class="row">
        <div class="col-6">
            <h3>Detail Pegawai</h3>
        </div>
        <div class="text-right col-6">
            <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
@endsection
@section('content-new')
    <title>Data Barang</title>
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body row">
                    <div class="col-md-4" id="barcode">
                        <img src="{{ Storage::url($pegawai->foto) }}" class="img-fluid img-thumbnail" alt="Responsive image">
                    </div>
                    <div class="col-md-8">
                        <table>
                            <tr>
                                <th width="35%">NIP</th>
                                <td>: {{ $pegawai->nip }}</td>
                            </tr>
                            <tr>
                                <th width="35%">Nama</th>
                                <td>: {{ $pegawai->nama }}</td>
                            </tr>
                            <tr>
                                <th width="35%">Hp</th>
                                <td>: {{ $pegawai->hp }}</td>
                            </tr>
                            <tr>
                                <th width="35%">Jabatan</th>
                                <td>: {{ $pegawai->jabatan }}</td>
                            </tr>
                            <tr>
                                <th width="35%">Nama Seksi</th>
                                <td>: {{ $pegawai->nama_seksi }}</td>
                            </tr>
                            <tr>
                                <th width="35%">Nama Bidang</th>
                                <td>: {{ $pegawai->nama_bidang }}</td>
                            </tr>
                            <tr>
                                <th width="35%">Nama Dinas</th>
                                <td>: {{ $pegawai->nama_dinas }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
