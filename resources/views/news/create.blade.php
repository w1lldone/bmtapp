@extends ('layouts.master')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="/news">News</a></li>
    <li>Tambah news</li>
  </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
	  @include('layouts.status')
	  <div class="card">
        <div class="card-header" data-background-color="bmt-green">
          <h4 class="title">Tambah News</h4>
        </div>
		<div class="card-content">
		  <form method="POST" action="/news" enctype="multipart/form-data">
		    {{ csrf_field() }}
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group label-floating {{ $errors->has('name') ? ' has-error' : '' }}">
				  <label class="control-label">Judul news</label>
				  <input value="{{ old('name') }}" name="name" type="text" class="form-control" required>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-12">
			  	<div class="form-group label-floating {{ $errors->has('link') ? ' has-error' : '' }}">
				  <label class="control-label">Link</label>
				  <textarea class="form-control" name="link">{{ old('link') }}</textarea>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-lg-12">
		  		<div class="alert alert-info alert-with-icon" data-notify="container">
		  	        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
		  	        <i data-notify="icon" class="material-icons">info</i>
		  	        <span data-notify="message">Rekomendasi ukuran gambar: 800x500 pixel</span>
		  	    </div>
			  	<label class="{{ $errors->has('photo')? 'text-danger' : '' }}">Pilih gambar</label>
				<input required title="Pilih gambar" type="file" name="photo" placeholder="Pilih gambar">
			  </div>
			</div>
            <button type="submit" class="btn btn-success pull-right">Simpan</button>
            <div class="clearfix"></div>		  
		  </form>
			</div>
		</div>
	</div>
</div>
@endsection
