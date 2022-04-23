@extends('layouts.layout')
@section('content')
<title>Edit Data Kategori</title>
<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-dark">Edit Data</h6>
</div>
<div class="card-body">
	<div class="x_content">
		<form action="{{ action('KategoriController@update', $data->id) }}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="">Kode Kategori</label>
				<input type="text" name="kode_kategori" class="form-control" value="{{$data->kode_kategori}}" required placeholder="Masukan Kode Kategori">
			</div>   
			<div class="form-group">
				<label for="">Nama Kategori</label>
				<input type="text" name="nama_kategori" class="form-control" value="{{$data->nama_kategori}}" required placeholder="Masukan Nama Kategori">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
@endsection