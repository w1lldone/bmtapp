@extends ('layouts.master')

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="/mku">MKU</a></li>
    <li>Tambah MKU</li>
  </ol>
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
	  @include('layouts.status')
	  <div class="card">
        <div class="card-header" data-background-color="bmt-green">
          <h4 class="title">Tambah MKU</h4>
        </div>
		<div class="card-content">
		  <form method="POST" action="/mku">
		    {{ csrf_field() }}
			<div class="row">
			  <div class="col-lg-6">
			    <div class="form-group label-floating {{ $errors->has('name') ? ' has-error' : '' }}">
				  <label class="control-label">Nama MKU</label>
				  <input value="{{ old('name') }}" name="name" type="text" class="form-control">
				</div>
			  </div>
			  <div class="col-lg-6">
			    <div class="form-group label-floating {{ $errors->has('cabang_id') ? ' has-error' : '' }}">
				  <label class="control-label">Cabang</label>
				  <select name="cabang_id" id="cabang_id" class="form-control">
					<option value=""></option>
					@foreach (\App\Cabang::all() as $cabang)
						<option value="{{$cabang->id}}">{{$cabang->name}}</option>
					@endforeach
				  </select>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-12">
			  	<div class="form-group label-floating {{ $errors->has('alamat') ? ' has-error' : '' }}">
				  <label class="control-label">Alamat</label>
				  <input name="alamat" value="{{ old('alamat') }}" type="text" class="form-control">
				</div>
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
