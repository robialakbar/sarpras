@extends('layouts.layout')
@section('content')
<title>Data Ruangan</title>

<div class="card-header py-3">
	<h6 class="m-0 font-weight-bold text-dark">Data Ruangan</h6>
</div>
<div class="card-body">
	<div class="table-responsive">
		<button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
		<br>
		<br>
		<table id="dataTable" class="table table-bordered" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Ruangan</th>
					<th>Nama Ruangan</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
            @foreach ($data as $i => $u)
            <tr class="data-row">
              <td class="align-middle iteration">{{ ++$i }}</td>
              <td class="align-middle id_barang">{{ $u->kode_ruangan }}</td>
              <td class="align-middle id_barang">{{ $u->nama_ruangan }}</td>
              <td>  
                <div class="row">
                   <a href="{{ action('RuanganController@edit', $u->id) }}" class="btn btn-primary btn-sm ml-2">Edit</a>
                   <button type="button" data-url="{{ action('RuanganController@destroy', $u->id) }}" class="btn btn-danger btn-sm ml-2 hapus">Hapus</button>
                </div>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Masukan Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{ action('RuanganController@store') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="">Kode Ruangan</label>
						<input type="text" name="kode_ruangan" class="form-control"  required>
					</div>					
					<div class="form-group">
						<label for="">Nama Ruangan</label>
						<input type="text" name="nama_ruangan" class="form-control"  required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection