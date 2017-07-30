@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li>Reminder</li>
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
						<h4 class="title">Riwayat reminder kredit</h4>
						<p class="category">BMT Bina Umah Godean</p>
					</div>
					<div class="col-xs-6">
						<a data-toggle="modal" data-target="#kreditRemindaer" class="btn btn-round btn-just-icon pull-right" rel="tooltip" style="background: WhiteSmoke;;" title="Kredit reminder"><i class="material-icons" style="color: rgba(84, 217, 93, 255);">announcement</i></a>
					</div>
				</div>
			</div>
			<div class="card-content table-responsive">
				<table class="table">
					<thead class="text-danger">
						<th>Tanggal</th>
						<th>Jumlah nasabah</th>
						<th>Diingatkan pada</th>
						<th>Tindakan</th>
					</thead>
					<tbody>
						@foreach ($reminders as $reminder)
							<tr>
								<td>{{ $reminder->tanggal->formatLocalized('%d %B %Y') }}</td>
								<td>{{ $reminder->detail->count() }}</td>
								<td>{{ $reminder->created_at->formatLocalized('%d %B %Y') }}</td>
								<td class="td-actions text-right">
									<a type="button" href="/reminder/{{$reminder->id}}/view" rel="tooltip" title="Lihat detail" class="btn btn-info btn-simple">
										<i class="material-icons" style="font-size: 24px;">info</i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
				  {{ $reminders->links() }}
				</div>
			</div>
		</div>
	  </div>
	</div>
@endsection

@section('modal')
	{{-- @include('layouts.modals') --}}
@endsection