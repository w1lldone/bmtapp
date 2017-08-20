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
                <li><a href="/reminder">Tanggal</a></li>
                <li class="active"><a href="/reminder?view=nasabah">Nasabah</a></li>
              </ul>
            </div>
  				</div>
  			</div>
  			<div class="card-content table-responsive">
  				<table class="table">
  					<thead class="text-danger">
  						<th>Nasabah</th>
              <th>Pengingat ke</th>
  						<th>Pengingat terakhir</th>
  						<th>Tindakan</th>
  					</thead>
  					<tbody>
  						@foreach ($nasabahs as $nasabah)
  							<tr>
  								<td>{{ $nasabah->name }}</td>
  								<td>{{ $nasabah->reminder_detail()->count() }}</td>
  								<td>{{ $nasabah->reminder_detail()->latest()->first()->created_at->formatLocalized('%d %B %Y') }}</td>
  								<td class="td-actions text-right">
  									<a type="button" href="/reminder/nasabah/{{$nasabah->id}}/view" rel="tooltip" title="Lihat detail" class="btn btn-info btn-simple">
  										<i class="material-icons" style="font-size: 24px;">info</i>
  									</a>
  								</td>
  							</tr>
  						@endforeach
  					</tbody>
  				</table>
  				<div class="text-center">
  				  {{ $nasabahs->links() }}
  				</div>
  			</div>
  		</div>
	  </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header" data-background-color="bmt-green">
              <h4 class="title">Pengingat Pembayaran Kredit</h4>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-lg-12">
                      <form action="/reminder/create" method="GET">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group label-floating">
                                  <label class="control-label">Masukkan tanggal</label>
                                  <input class="form-control" id="date" required name="tanggal" type="text"/>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Proses</button>
                        <div class="clearfix"></div>
                      </form> 
                    </div>
                </div>
            </div>
        </div>
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