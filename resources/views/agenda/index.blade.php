@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li>Agenda</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			@include('layouts.status')
			<div class="card">
        <div class="card-header" data-background-color="bmt-green">
        	<div class="row">
        		<div class="col-xs-8">
        			<h4 class="title">Agenda</h4>
                <p class="category">Daftar agenda MKU</p>
        		</div>
        		<div class="col-xs-4">
        			<a href="/agenda/create" class="btn btn-round btn-just-icon pull-right" rel="tooltip" style="background: WhiteSmoke;;" title="Tambah Agenda"><i class="material-icons text-success">add</i></a>
        		</div>
        	</div>
        </div>
				<div class="card-content">
					<table class="table">
						<thead class="text-danger">
							<th>No</th>
							<th>MKU</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Jam</th>
							<th>Lokasi</th>
							<th>Tindakan</th>
						</thead>
						<tbody>
							@foreach ($agendas as $agenda)
								<tr>
									<td>{{ $agendas->toArray()['from']+$loop->index }}</td>
									<td>{{ $agenda->mku->name }}</td>
									<td>{{ $agenda->name }}</td>
									<td>{{ $agenda->tanggal->format('j F Y') }}</td>
									<td>{{ $agenda->jam }}</td>
									<td>{{ $agenda->lokasi }}</td>
									<td class="td-actions text-right">
										<a href="/agenda/{{ $agenda->id }}/edit" type="button" rel="tooltip" title="Edit MKU" class="btn btn-primary btn-simple btn-xs">
											<i class="material-icons">edit</i>
										</a>
										<form action="/agenda/{{$agenda->id}}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" onclick="return confirm('Anda Yakin akan menghapus MKU?')" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs">
												<i class="material-icons">close</i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $agendas->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection
