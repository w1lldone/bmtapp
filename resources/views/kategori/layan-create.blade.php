@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/kategori?tab=layanan">Kategori layanan</a></li>
      <li>Tambah produk</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			@include('layouts.status')
			<div class="card">
	            <div class="card-header" data-background-color="orange">
	                <h4 class="title">Tambah produk layanan</h4>
	            </div>
				<div class="card-content">
					<form method="POST" action="/kategori/layanan">
						{{ csrf_field() }}
						<div class="form-group">
							<p class="category">Kategori layanan</p>
							<select name="kat_layanan_id" class="form-control">
							  @foreach ($katLayanans as $katLayanan)
							  	<option value="{{ $katLayanan->id }}">{{ $katLayanan->name }}</option>
							  @endforeach		
							</select>
						</div>
						<div class="form-group label-floating">
							<label class="control-label">Nama produk</label>
							<input name="name" type="text" class="form-control">
						</div>
						<div class="input-group">
							<span class="input-group-addon">
								Rp.
							</span>
							<input type="number" name="harga" class="form-control" placeholder="Harga">
						</div>
						<button type="submit" class="btn btn-success pull-right">Simpan</button>
                        <div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
