@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="/feedback">Feedback</a></li>
	  <li>Detail</li>
  </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-8 col-lg-offset-1">
			<div class="card" style="margin-bottom: 5px">
				<div class="card-content">
					<div class="clearfix">
						<div class="pull-left">
							<h3 class="title">{{ $feedback->judul }}</h3>
							<span class="category"><i class="material-icons">person</i> {{ $feedback->nasabah->name }}</span>
							<span class="label label-{{ $feedback->kategoriColor() }}" style="margin-left: 10px">{{ $feedback->feedback_kategori->name }}</span>
						</div>
						<div class="pull-right">
							<span>{{ $feedback->created_at->format('j F Y') }}</span>
						</div>
					</div>
					<div style="margin-top: 10px">
						@if (empty($feedback->gambar))
							<div class="text-muted text-center">
								<i class="material-icons" style="font-size: 6rem">insert_photo</i>
								<h4>Tidak ada gambar</h4>
							</div>
						@else
							<img src="{{ $feedback->gambar }}" class="img-responsive">
						@endif
						<p style="margin-top: 10px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection