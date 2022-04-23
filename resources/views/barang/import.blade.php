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
<div class="row">
	<div class="card col-12">
		<div class="card-body">
			<form action="{{ action('BarangController@importStore') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="exampleFormControlFile1">Import Data Barang</label>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="import_file"  accept=".xls,.xlsx">
					<hr>
					<button class="btn btn-primary">submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection


