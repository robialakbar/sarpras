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
                    <h6 class="m-0 font-weight-bold text-dark">Setting Aplikasi</h6>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0" data-language="id" id="example">
                    <thead>
                        <tr>
                            <th>Nama Aplikasi</th>
                            <th>Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data->nama ?? '' }}</td>
                            <td><img src="{{ asset('files/' . $data->logo) ?? '' }}" alt="" style="height: 100px"></td>
                            <td><a href="{{ action('SettingController@edit', $data) }}" class="btn btn-warning~">Ubah</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
