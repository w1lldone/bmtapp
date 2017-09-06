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
	  <div class="col-lg-8">
  		<div class="card">
  			<div class="card-header" data-background-color="bmt-green">
  				<div class="row">
  					<div class="col-lg-5">
  						<h4 class="title">Riwayat reminder kredit</h4>
  						<p class="category">BMT Bina Umah Godean</p>
  					</div>
            <div class="col-lg-7">
              <ul class="nav nav-pills nav-pills-white">
                <li><a>Lihat menurut:</a></li>
                <li class="active"><a href="/reminder">Tanggal</a></li>
                <li><a href="/reminder?view=nasabah">Nasabah</a></li>
              </ul>
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
    <div class="col-sm-4">
      @include('reminder.side')
    </div>
	</div>
@endsection

@section('script')
  <script>
      $(document).ready(function(){
          var date_input=$('input[name="tanggal"]'); //our date input has the name "date"
          date_input.datepicker({
              format: 'yyyy-mm-dd',
              todayHighlight: true,
              autoclose: true,
          })
      })
  </script>
@endsection