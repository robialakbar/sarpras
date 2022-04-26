@extends('layouts.layout')
@section('css')
<style type="text/css">


	.table{
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
	<div class="col-6"><h3>Detail Data Barang</h3></div>
	<div class="text-right col-6"><a href="{{ action('BarangController@index') }}" class="btn btn-warning">Kembali</a></div>
</div>
@endsection
@section('content-new')
<title>Data Barang</title>
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<div class="col-12 text-center">
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
		<div class="card">
			<div class="card-body text-center">
				<div class="row">
					
					<div class="col-12">
					@if(!empty($data->gambar))
					<img src="{{ Storage::url($data->gambar) }}"  class="img-fluid img-thumbnail" alt="Responsive image">
					@else
					<img src="{{ asset('assets/img/default.jpg') }}"  class="img-fluid img-thumbnail" alt="Responsive image">
					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection