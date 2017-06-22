@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li>Kategori produk</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			@include('layouts.status')
			<ul class="nav nav-tabs" background="orange">
				<li role="presentation" class="active"><a href="/kategori">Produk</a></li>
				<li role="presentation" ><a href="/kategori?tab=layanan">Layanan</a></li>
			</ul>
			<div class="card">
	            <div class="card-header" data-background-color="orange">
	            	<div class="row">
	            		<div class="col-xs-8">
	            			<h4 class="title">Kategori produk</h4>
			                <p class="category">Daftar kategori produk</p>
	            		</div>
	            		<div class="col-xs-4">
	            			<a data-toggle="modal" data-target="#newKategori" class="btn btn-round btn-just-icon pull-right" rel="tooltip" style="background: WhiteSmoke;;" title="Tambah kategori produk"><i class="material-icons" style="color: orange;">add</i></a>
	            		</div>
	            	</div>
	            </div>
				<div class="card-content">
					<table class="table">
						<tbody>
							@foreach ($kategoris as $kategori)
								<tr>
									<td>{{ $kategori->id }}</td>
									<td>{{ $kategori->name }}</td>
									<td class="td-actions text-right">
										<a href="/kategori/produk/{{ $kategori->id }}/edit" type="button" rel="tooltip" title="Edit kategori" class="btn btn-primary btn-simple btn-xs">
											<i class="material-icons">edit</i>
										</a>
										<form action="/kategori/produk/{{$kategori->id}}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" onclick="return confirm('Anda Yakin akan menghapus kategori?')" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs">
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
