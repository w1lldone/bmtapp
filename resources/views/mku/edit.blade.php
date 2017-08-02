@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/mku">MKU</a></li>
      <li>Edit MKU</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			@include('layouts.status')
			<div class="card">
	            <div class="card-header" data-background-color="bmt-green">
	                <h4 class="title">Edit MKU</h4>
	            </div>
				<div class="card-content">
					<form method="POST" action="/mku/{{ $mku->id }}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group label-floating">
							<label class="control-label">Nama MKU</label>
							<input name="name" type="text" class="form-control" value="{{ $mku->name }}">
						</div>
						<button type="submit" class="btn btn-success pull-right">Simpan</button>
                        <div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
