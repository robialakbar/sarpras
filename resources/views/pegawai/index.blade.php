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
    <link href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')
    <title>Data Barang</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-dark">Pegawai</h6>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary btn-sm float-right" href="{{ action('PegawaiController@create') }}">Tambah Data</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (auth()->user()->hasRole('admin-pusat'))
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <form class="">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Cabang</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="cabang">
                                        <option disabled selected>Pilih Pilih Cabang</option>
                                        @foreach ($cabang as $key => $val)
                                            <option {{ request()->get('cabang') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary mb-2">Filter</button>
                                    {{-- <button type="submit" class="btn btn-danger mb-2">Clear</button> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped mb-0" data-language="id" id="example">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Hp</th>
                            <th>Jabatan</th>
                            <th>Nama Seksi</th>
                            <th>Nama Bidang</th>
                            <th>Nama Dinas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $pegawai)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url($pegawai->foto) }}" class="img-fluid img-thumbnail" alt="Responsive image">
                                </td>
                                <td>{{ $pegawai->nip }}</td>
                                <td>{{ $pegawai->nama }}</td>
                                <td>{{ $pegawai->hp }}</td>
                                <td>{{ $pegawai->jabatan }}</td>
                                <td>{{ $pegawai->nama_seksi }}</td>
                                <td>{{ $pegawai->nama_bidang }}</td>
                                <td>{{ $pegawai->nama_dinas }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ action('PegawaiController@edit', $pegawai->id) }}" class="btn btn-xs btn-warning ">Edit</a>
                                        <button data-url="{{ action('PegawaiController@destroy', $pegawai->id) }}" class="btn btn-xs btn-danger hapus">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
