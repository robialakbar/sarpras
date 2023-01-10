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
                    <h6 class="m-0 font-weight-bold text-dark">Edit Aplikasi</h6>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ action('SettingController@update', $setting) }}" method="POST" enctype='multipart/form-data'>
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $setting->nama }}" name="nama" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" value="" name="logo" required>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">submit</button>
            </form>
        </div>
    @endsection
