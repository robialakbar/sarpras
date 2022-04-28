<form action="{{ action('BarangController@simpanRuang', $barang->id) }}" method="POST" id="kantorCabangForm">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		@csrf
		@method('PUT')
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-2 col-form-label">Ruang</label>
			<div class="col-sm-10">
				<select class="custom-select my-1 mr-sm-2" name="ruang">
					<option>Ruangan</option>
					@foreach($data as $key => $val )

					<option value="{{ $val }}" >{{ $val }}</option>
					@endforeach
				</select>

			</div>
		</div>
		
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button class="btn btn-brand btn-square btn-primary">Simpan</button>

	</div>
</form>