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
@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                deferRender: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdf',
                        exportOptions: {
                            columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],

                        },
                        orientation: 'landscape',
                        pageSize: 'TABLOID',
                        title: 'Data Barang',
                    },
                    {
                        extend: 'excel',
                        title: 'Data Barang',
                        exportOptions: {
                            columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],

                        },
                    }
                ],
            });
        });
    </script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
@endsection
@section('content')
    <title>Data Barang</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-dark">Laporan Data Barang</h6>
                </div>
                <div class="col-4">
                    <h5 class="float-right font-weight-bold text-dark">Total Data : {{ $data->count() }}</h5>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <form class="">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Ruang</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ruang">
                                    <option disabled selected>Pilih Ruangan</option>
                                    @foreach ($ruangan as $val)
                                        <option {{ request()->get('ruang') == $val ? 'selected' : '' }} value="{{ $val }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if (auth()->user()->hasRole('admin-pusat'))
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Cabang</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="cabang">
                                        <option disabled selected>Pilih Cabang</option>
                                        @foreach ($cabang as $key => $val)
                                            <option {{ request()->get('cabang') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary mb-2 col-12">Filter</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-danger mb-2 col-12">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped mb-0" data-language="id" id="example">
                    <thead>
                        <tr>
                            <th>QrCode</th>
                            <th>Kode</th>
                            <th>Kode Lokasi</th>
                            <th>Tahun Anggaran</th>
                            <th>Kode Barang</th>
                            <th>No Aset</th>
                            <th>Subkelompok Barang</th>
                            <th>Merk/ Type</th>
                            <th>Tanggal Perolehan</th>
                            <th>Rupiah Satuan</th>
                            <th>Ruang</th>
                            <th>Kondisi Barang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $url = env('APP_URL') . '/scan-barcode/';
                        @endphp
                        @foreach ($data as $k => $val)
                            @php
                                $qrcode = \QrCode::format('png')
                                    ->size(100)
                                    ->generate($url . $val->id);
                                $qrcode = base64_encode($qrcode);
                                // dd($qrcode);
                            @endphp
                            <tr>
                                <td><img src='data:image/png;base64,{{ $qrcode }}'></td>
                                <td>{{ $val->kode }}</td>
                                <td>{{ $val->kode_lokasi }}</td>
                                <td>{{ $val->tahun_anggaran }}</td>
                                <td>{{ $val->kode_barang }}</td>
                                <td>{{ $val->nomor_aset }}</td>
                                <td>{{ $val->subkelompok_barang }}</td>
                                <td>{{ $val->merk_type }}</td>
                                <td>{{ $val->tanggal_perolehan }}</td>
                                <td>Rp.{{ Ribuan($val->rupiah_satuan) }}</td>
                                <td>{{ optional($val->Ruangan)->nama_ruangan ?? $val->ruang }}</td>
                                <td>{{ $val->kondisi_barang }}</td>
                                <td>{{ $val->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
