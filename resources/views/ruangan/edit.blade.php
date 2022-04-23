@extends('layouts.layout')
@section('content')
<title>Edit Data Ruangan</title>
<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-dark">Edit Data</h6>
</div>
<div class="card-body">
	<div class="x_content">
		<form action="{{ action('RuanganController@update', $data->id) }}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="">kode ruangan</label>
				<input type="text" name="kode_ruangan" class="form-control" value="{{$data->kode_ruangan}}" required placeholder="Masukann kode ruangan">
			</div>
			<div class="form-group">
				<label for="">nama ruangan</label>
				<input type="text" name="nama_ruangan" class="form-control" value="{{$data->nama_ruangan}}" required placeholder="Masukann Nama ruangan">
			</div>

			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
	@endsection