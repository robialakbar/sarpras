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

@section('content')
<title>Data Barang</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</div>
<div class="row mb-3"> 
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Kode</label>
						<input type="text" class="form-control" id="validationDefault01" placeholder="Pencarian Kode"  required>
					</div>
					<div class="col-md-4 mb-3">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Example select</label>
							<select class="form-control" id="exampleFormControlSelect1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Example select</label>
							<select class="form-control" id="exampleFormControlSelect1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-info col-12">Filter</button>
			</div>
		</div>
	</div>
</div>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-dark">Data Barang</h6>
	</div>

	<div class="card-body">

		<div class="table-responsive">
			<button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data</button>
			<a class="btn btn-success" href="{{ action('BarangController@import') }}" >Import</a>
			<br>
			<br>

			<table class="table table-striped mb-0" data-language="id">
				<thead>
					<tr>
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
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $k => $val)
					<tr>
						<td>{{ $val->kode }}</td>
						<td>{{ $val->kode_lokasi }}</td>
						<td>{{ $val->tahun_anggaran }}</td>
						<td>{{ $val->kode_barang }}</td>
						<td>{{ $val->nomor_aset }}</td>
						<td>{{ $val->subkelompok_barang }}</td>
						<td>{{ $val->merk_type }}</td>
						<td>{{ $val->tanggal_perolehan }}</td>
						<td>Rp.{{ Ribuan($val->rupiah_satuan) }}</td>
						<td>{{ $val->ruang }}</td>
						<td>{{ $val->kondisi_barang }}</td>
						<td>
							<a href="{{ action('BarangController@show', $val->id) }}" class="btn btn-xs btn-primary">Detail</a>
							<a href="" class="btn btn-xs btn-primary">Edit</a>
							<a href="" class="btn btn-xs btn-primary">Hapus</a>
						</td>
					</tr>
					@empty
					<tr class="align-middle">
						<td colspan="8" class="text-center">Tidak ada data untuk ditampilkan</td>
					</tr>
					@endforelse
				</tbody>
			</table>

			<div class="card-body p-2 border-top">
				<div class="row justify-content-between align-items-center">
					<div class="col-auto ml-auto">
						{!! $data->appends(request()->except('_token'))->links() !!}
					</div>
				</div>
			</div>

		</div>
	</div>
	@endsection