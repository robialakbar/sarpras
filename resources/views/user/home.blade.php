@extends('layouts.layout')
@section('js')
<script src="{{ asset('js/chart.js') }}"></script>
<script src="{{ asset('js/chartjs-plugin-colorschemes.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script type="text/javascript">
	var ctx = document.getElementById('myChart').getContext('2d');
	var ctx2 = document.getElementById('myChart2').getContext('2d');
	var ctx3 = document.getElementById('myChart3').getContext('2d');

	// var data= 
	var data =  {
		labels: <?= $tahun ?>,
		datasets: [{
			label: 'Baik',
			backgroundColor: 'rgb(28, 200, 138)',
			borderColor: 'rgb(28, 200, 138)',
			data: <?= $jumlahBaik ?>
		},{
			label: 'Rusak Ringan',
			backgroundColor: '#f6c23e',
			borderColor: '#f6c23e',
			data: <?= $jumlahRusakRingan ?>
		},{
			label: 'Rusak Berat',
			backgroundColor: '#e74a3b',
			borderColor: '#e74a3b',
			data: <?= $jumlahRusakBerat ?>
		},]
	}

	var stackedBar = new Chart(ctx, {
		type: 'bar',
		data: data,
		plugins: [ChartDataLabels],
		options: {
			scales: {
				xAxes: [{
					stacked: true
				}],
				yAxes: [{
					stacked: true
				}]
			},
			legend: {
				display: true,
			},
			plugins: {
				datalabels: {
					color: '#000000'
				}
			},
			tooltips: {
				mode: 'index'
			}
		}
	});

	var data2 =  {
		labels: ['Baik','Rusak Ringan','Rusak Berat'],
		datasets: [{
			label: 'Jumlah',
			data: <?= $dataChart2 ?>,
			backgroundColor: [
			'rgb(28, 200, 138)',
			'#e74a3b',
			'#f6c23e',
			],
		}
		]
	}

	var data3 =  {
		labels: <?= $labelChart3 ?>,
		datasets: [{
			label: 'Jumlah',
			data: <?= $dataChart3 ?>,
		}
		]
	}

	var myPieChart = new Chart(ctx2, {
		type: 'pie',
		data: data2,
		options: {
			legend: {
				display: true,
				position:'right'
			},
			plugins: {
				datalabels: {
					color: '#000000'
				}
			},

		}
	});

	var myPieChart2 = new Chart(ctx3, {
		type: 'pie',
		data: data3,

		options: {
			legend: {
				display: true,
				position:'right'
			},
			plugins: {
				datalabels: {
					color: '#000000'
				},
				plugins: {

					colorschemes: {

						scheme: 'brewer.Paired12'

					}

				}
			},

		}
	});
</script>
@endsection
@section('content')
<title>Dashboard</title>
<div class="card">
	<div class="card-body">

		<div class="row"> 
			<div class="col-md-2 mb-4">
				<div class="card border-left-dark shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Barang</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{$barang->count()}}</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4">
				<div class="card border-left-dark shadow h-100 py-2 bg-success">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Baik</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{$barang->where('kondisi_barang','Baik')->count()  }}</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4">
				<div class="card border-left-dark shadow h-100 py-2 bg-warning">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Rusak Ringan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800">{{$barang->where('kondisi_barang','Rusak Ringan')->count()  }}</div>
							</div>

						</div>
					</div>
				</div>
			</div>  
			<div class="col-md-2 mb-4">
				<div class="card border-left-dark shadow h-100 py-2 bg-danger">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2 text-white">
								<div class="text-xs font-weight-bold text-white text-uppercase mb-1">Rusak Berat</div>
								<div class="h5 mb-0 font-weight-bold text-white">{{$barang->where('kondisi_barang','Rusak Berat')->count()  }}</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-4">
				<form action="{{ url()->full() }}" method="GET">
					<div class="form-row">
						<div class="col-md-12 mb-3">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Tahun Anggaran</label>
								<select class="form-control" name="tahun">
									<option disabled selected>Pilih Tahun Anggaran</option>
									@foreach($tahun as $val)
									<option value="{{ $val }}">{{ $val }}</option>
									@endforeach
								</select>
							</div>
							<button class="btn btn-sm btn-success col-12">filter</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="card shadow mb-4">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<canvas id="myChart"></canvas>
					
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					
					<canvas id="myChart2"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<canvas id="myChart3"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
