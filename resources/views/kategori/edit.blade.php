@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/kategori/produk">Kategori</a></li>
      <li>Edit kategori</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
	            <div class="card-header" data-background-color="orange">
	                <h4 class="title">Edit Kategori Barang</h4>
	            </div>
				<div class="card-content">
					<form action="/kategori/produk/{{ $kategori->id }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<img src="{{$kategori->foto}}" alt="Tidak ada foto">
						</div>
						<div class="form-group label-floating">
							<label class="control-label">Nama</label>
							<input type="text" class="form-control" name="name" value="{{ $kategori->name }}" required>
						</div>
						<div>
						    <input title="Masukkan Foto" type="file" id="foto" name="foto" placeholder="Pilih gambar">
						</div>
						<button type="submit" class="btn btn-primary pull-right">Update</button>
                        <div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
