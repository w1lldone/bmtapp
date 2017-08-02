@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li>MKU</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-1">
			@include('layouts.status')
			<div class="card">
	            <div class="card-header" data-background-color="bmt-green">
	            	<div class="row">
	            		<div class="col-xs-8">
	            			<h4 class="title">MKU</h4>
			                <p class="category">Daftar MKU</p>
	            		</div>
	            		<div class="col-xs-4">
	            			<a href="/mku/create" class="btn btn-round btn-just-icon pull-right" rel="tooltip" style="background: WhiteSmoke;;" title="Tambah MKU"><i class="material-icons text-success">add</i></a>
	            		</div>
	            	</div>
	            </div>
				<div class="card-content">
					<table class="table">
						<tbody>
							@foreach ($mkus as $mku)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $mku->name }}</td>
									<td class="td-actions text-right">
										<a href="/mku/{{ $mku->id }}/edit" type="button" rel="tooltip" title="Edit MKU" class="btn btn-primary btn-simple btn-xs">
											<i class="material-icons">edit</i>
										</a>
										<form action="/mku/{{$mku->id}}" method="POST">
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
				</div>
			</div>
		</div>
	</div>
@endsection

@section('modal')
	@include('layouts.modals')
@endsection
