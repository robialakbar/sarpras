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
    <title>Data Cabang</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-dark">Cabang</h6>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary btn-sm float-right" href="{{ action('CabangController@create') }}">Tambah Data</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0" data-language="id" id="example">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Cabang</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $cabang)
                            <tr>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>{{ $cabang->cabang }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ action('CabangController@edit', $cabang->id) }}" class="btn btn-xs btn-warning ">Edit</a>
                                        <button data-url="{{ action('CabangController@destroy', $cabang->id) }}" class="btn btn-xs btn-danger hapus">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
