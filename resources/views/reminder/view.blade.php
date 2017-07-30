@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/reminder">Reminder</a></li>
		<li>Detail</li>
	</ol>
@endsection

@section('content')
	<div class="row">
		@include('layouts.errors')
		@include('layouts.status')
	</div>
	<div class="row">
	  <div class="col-lg-8 col-lg-offset-2">
		<div class="card">
			<div class="card-header" data-background-color="bmt-green">
				<div class="row">
					<div class="col-xs-6">
						<h4 class="title">Detail reminder kredit</h4>
						<p class="category">Tanggal {{ $reminder->tanggal->format('j F Y') }}</p>
					</div>
				</div>
			</div>
			<div class="card-content table-responsive">
				<h4></h4>
				<table class="table">
					<thead class="text-danger">
						<th>No</th>
						<th>Nama nasabah</th>
						<th>Diingatkan pada</th>
					</thead>
					<tbody>
						@foreach ($reminder->detail as $detail)
							<tr>
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $detail->nasabah->name }}</td>
								<td>{{ $detail->created_at->format('j F Y\, G:i') }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	  </div>
	</div>
@endsection