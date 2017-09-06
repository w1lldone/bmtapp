@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/reminder">Reminder</a></li>
      <li>Cek tanggal</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Cek tanggal reminder</h4>
					<p class="category">BMT Bina Umah Godean</p>
				</div>
				<div class="card-content">
					@if ($reminder->isNotEmpty())
						<div class="text-center">
							<i class="material-icons text-muted" style="font-size: 100px; margin-top: 20px; opacity: 0.5;">announcement</i>
							<h4 class="text-muted">Reminder sudah selesai!</h4>
							<p class="text-muted">Kredit tanggal <strong>{{ $tanggal }}</strong> sudah diingatkan. <br>Ingatkan sekali lagi?</p>
						</div>
          @else
            <div class="text-center">
              <i class="material-icons text-primary" style="font-size: 100px; margin-top: 20px;">announcement</i>
              <h4 class="text-muted">Konfirmasi Reminder</h4>
              <p class="text-muted">Anda akan mengingatkan kredit tanggal <strong>{{ $tanggal }}</strong>.<br>Lanjutkan?</p>
            </div>
					@endif
					<div class="row">
					    <div class="col-lg-12">
					    	<h4 class="">Pesan:</h4>
					      <p>{{ $template->head }} </p>
					      <ul>
					        <li>Nama: <b>Nama nasabah</b></li>
					        <li>Rekening kredit: <b>No rekening</b></li>
					        <li>Cicilan ke: <b>Cicilan</b></li>
					        <li>Nominal cicilan: <b>Nominal</b></li>
					      </ul>
					      <p>{{ $template->foot }}</p>
					    </div>
					</div>
					<form method="POST" action="/reminder" class="pull-right">
					  {{ csrf_field() }}
					  <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
					  <button type="submit" class="btn btn-success">Ya</button>
					  <button onclick="history.go(-1)" class="btn btn-warning">Tidak</button>
					</form>

				</div>
			</div>
		</div>				
	</div>
@endsection

@section('modal')
	@include('layouts.modals')
@endsection
