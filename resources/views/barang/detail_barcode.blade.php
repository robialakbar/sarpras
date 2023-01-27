<!DOCTYPE html>
<html>

<head>
    <title>Barcode Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row m-3">
            <h3>
                Detail Hasil Scan QrCode Barang
            </h3>
        </div>
        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">
                        <div class="col-12 text-center" id="barcode">
                            {!! $qrcode !!}
                        </div>
                        <table>
                            <tr>
                                <th width="35%">Kode</th>
                                <td>: {{ $data->kode }}</td>
                            </tr>
                            <tr>
                                <th>Kode Lokasi</th>
                                <td>: {{ $data->kode_lokasi }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Anggaran</th>
                                <td>: {{ $data->tahun_anggaran }}</td>
                            </tr>
                            <tr>
                                <th>Kode Barang</th>
                                <td>: {{ $data->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th>No Aset</th>
                                <td>: {{ $data->nomor_aset }}</td>
                            </tr>
                            <tr>
                                <th>Subkelompok Barang</th>
                                <td>: {{ $data->subkelompok_barang }}</td>
                            </tr>
                            <tr>
                                <th>Merk Type</th>
                                <td>: {{ $data->merk_type }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Perolehan</th>
                                <td>: {{ $data->tanggal_perolehan }}</td>
                            </tr>
                            <tr>
                                <th>Rupiah Satuan</th>
                                <td>: {{ $data->rupiah_satuan }}</td>
                            </tr>
                            <tr>
                                <th>Ruang</th>
                                <td>: {{ $data->ruang }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi Barang</th>
                                <td>: {{ $data->kondisi_barang }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-12">
                                    @if (!empty($data->gambar))
                                        <img src="{{ Storage::url($data->gambar) }}" class="img-fluid img-thumbnail" alt="Responsive image">
                                    @else
                                        <img src="{{ asset('assets/img/default.jpg') }}" class="img-fluid img-thumbnail" alt="Responsive image">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5  ">
                    <div class="card">
                        @if (!empty($data->pegawai_id))
                            <div class="card-header text-center">
                                Pemegang Barang
                            </div>
                            <div class="card-body text-center">
                                @if (!empty($data->pegawai_id))
                                    <img src="{{ Storage::url($data->Pegawai->foto) }}" class="img-fluid img-thumbnail" alt="Responsive image">
                                @else
                                    <img src="{{ asset('assets/img/default.jpg') }}" class="img-fluid img-thumbnail" alt="Responsive image">
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-4">Nama</div>
                                    <div class="col-md-8">{{ $data->Pegawai->nama }}</div>
                                    <div class="col-md-4">NIP</div>
                                    <div class="col-md-8">{{ $data->Pegawai->nip }}</div>
                                    <div class="col-md-4">HP</div>
                                    <div class="col-md-8">{{ $data->Pegawai->hp }}</div>
                                    <a href="{{ action('PegawaiController@show', $data->pegawai_id) }}" class="btn btn-sm btn-primary col-12 mt-3">Detail</a>
                                </div>

                            </div>
                        @else
                            <div class="card-header text-center">
                                Belum Ada Data Pemegang Barang
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
