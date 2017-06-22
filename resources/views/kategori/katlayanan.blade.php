@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li>Kategori layanan</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			@include('layouts.status')
			<ul class="nav nav-tabs" background="bmt-green">
				<li role="presentation" ><a href="/kategori">Produk</a></li>
				<li role="presentation" class="active"><a href="/kategori?tab=layanan">Layanan</a></li>
			</ul>
		</div>
		<div class="col-lg-5 col-lg-offset-1"><div class="card">
	            <div class="card-header" data-background-color="bmt-green">
	            	<div class="row">
	            		<div class="col-xs-8">
			            	<h4 class="title">Produk Layanan</h4>
			            	<p class="category">Daftar produk layanan</p>		
	            		</div>
	            		<div class="col-xs-4">
	            			<a href="/kategori/layanan/create" class="btn btn-round btn-just-icon pull-right" rel="tooltip" style="background: WhiteSmoke;" title="Tambah produk layanan"><i class="material-icons" style="color: rgba(84, 217, 93, 255);">add</i></a>
	            		</div>
	            	</div>
	            </div>
				<div class="card-content">
					<table class="table">
						<tbody>
							@foreach ($prodLayanans as $prodLayanan)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td class="hidden-xs">{{ $prodLayanan->katLayanan->name }}</td>
									<td>{{ $prodLayanan->name }}</td>
									<td class="td-actions text-right">
										<a href="/kategori/layanan/{{ $prodLayanan->id }}/edit" type="button" rel="tooltip" title="Edit produk" class="btn btn-primary btn-simple btn-xs">
											<i class="material-icons">edit</i>
										</a>
										<form action="/kategori/layanan/{{$prodLayanan->id}}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											<button type="submit" onclick="return confirm('Anda Yakin akan menghapus produk?')" rel="tooltip" title="Hapus" class="btn btn-danger btn-simple btn-xs">
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
		<div class="col-lg-5">
			<div class="card">
	            <div class="card-header" data-background-color="bmt-green">
	                <h4 class="title">Kategori Layanan</h4>
	                <p class="category">Daftar kategori layanan</p>
	            </div>
				<div class="card-content">
					<table class="table">
						<tbody>
							@foreach ($katLayanans as $katLayanan)
								<tr>
									<td>{{ $katLayanan->id }}</td>
									<td>{{ $katLayanan->name }}</td>
									{{-- <td class="td-actions text-right">
										<a href="/kategori/layanan/{{ $katLayanan->id }}/edit" type="button" rel="tooltip" title="Edit kategori" class="btn btn-primary btn-simple btn-xs">
											<i class="material-icons">edit</i>
										</a>
									</td> --}}
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
