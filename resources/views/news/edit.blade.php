@extends ('layouts.master')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="/news">News</a></li>
    <li>Edit news</li>
  </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
	  @include('layouts.status')
	  <div class="card">
        <div class="card-header" data-background-color="bmt-green">
          <h4 class="title">Edit News</h4>
        </div>
		<div class="card-content">
		  <form method="POST" action="/news/{{ $news->id }}" enctype="multipart/form-data">
		    {{ csrf_field() }}
		    {{ method_field('PATCH') }}
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group label-floating {{ $errors->has('name') ? ' has-error' : '' }}">
				  <label class="control-label">Judul news</label>
				  <input value="{{ $news->name }}" name="name" type="text" class="form-control" required>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-12">
			  	<div class="form-group label-floating {{ $errors->has('link') ? ' has-error' : '' }}">
				  <label class="control-label">Link</label>
				  <textarea class="form-control" name="link">{{ $news->link }}</textarea>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-12">
		  		<div class="alert alert-info alert-with-icon" data-notify="container">
		  	        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
		  	        <i data-notify="icon" class="material-icons">info</i>
		  	        <span data-notify="message">Rekomendasi ukuran gambar: 800x500 pixel</span>
		  	    </div>
		  	    <img src="{{ $news->photo }}" height="400px" class="my-3">
			  	<label class="{{ $errors->has('photo')? 'text-danger' : '' }}">Pilih gambar</label>
				<input title="Pilih gambar" type="file" name="photo" placeholder="Pilih gambar">
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
