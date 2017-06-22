@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li>Nasabah</li>
	</ol>
@endsection

@section('content')
	<div class="row">
		@include('layouts.errors')
		@include('layouts.status')
	</div>
	<div class="row">
		<div class="card">
			<div class="card-header" data-background-color="bmt-green">
				<div class="row">
					<div class="col-xs-6">
						<h4 class="title">Data Nasabah</h4>
						<p class="category">BMT Bina Umah Godean</p>
					</div>
					<div class="col-xs-6">
						<a data-toggle="modal" data-target="#CekRekening" class="btn btn-round btn-just-icon pull-right" rel="tooltip" style="background: WhiteSmoke;;" title="Tambah nasabah"><i class="material-icons" style="color: rgba(84, 217, 93, 255);">add</i></a>
					</div>
				</div>
			</div>
			<div class="card-content table-responsive">
				<table class="table">
					<thead class="text-danger">
						<th>Nama</th>
						<th>No Rekening</th>
						<th>Alamat</th>
						<th>Kontak</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						@foreach ($nasabahs as $nasabah)
							<tr>
								<td>{{ $nasabah->name }}</td>
								<td>{{ $nasabah->no_rekening }}</td>
								<td>{{ $nasabah->alamat }}</td>
								<td>{{ $nasabah->kontak }}</td>
								<td class="td-actions text-right">
									<a type="button" href="/nasabah/{{$nasabah->id}}/edit" rel="tooltip" title="Edit nasabah" class="btn btn-primary btn-simple btn-xs">
										<i class="material-icons">edit</i>
									</a>
									<form action="/nasabah/{{$nasabah->id}}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" onclick="return confirm('Anda Yakin akan menghapus nasabah?')" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs">
											<i class="material-icons">close</i>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
					{{ $nasabahs->links() }}
				</table>
			</div>
		</div>
	</div>
@endsection

@section('modal')
	@include('layouts.modals')
@endsection