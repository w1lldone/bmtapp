@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/nasabah">Nasabah</a></li>
      <li>Cek rekening</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="card">
				<div class="card-header" data-background-color="purple">
					<h4 class="title">Cek Rekening</h4>
					<p class="category">BMT Bina Umah Godean</p>
				</div>
				<div class="card-content">
					@if (is_null($tabung))
						<div class="text-center">
							<i class="material-icons text-muted" style="font-size: 100px; margin-top: 20px; opacity: 0.5;">announcement</i>
							<h4 class="text-muted">Nasabah tidak terdaftar!</h4>
							<p class="text-muted">Harap periksa kembali <code>nomor rekening</code> dan <code>cabang</code></p>
							<a onclick="history.go(-1)" title="Kembali" rel="tooltip" title="kembali" class="btn btn-warning btn-round btn-just-icon"><i class="material-icons">arrow_back</i></a>
						</div>
					@endif
					@if (!is_null($tabung))
						<form action="/nasabah/create" method="GET">
							{{ csrf_field() }}
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Nasabah ID</label>
										<input disabled type="text" class="form-control" name="id" value="{{ $tabung->NASABAH_ID }}">
									</div>
									<div class="form-group label-floating">
										<label class="control-label">No Rekening</label>
										<input disabled type="text" class="form-control" name="rekening" value="{{ $no_rekening }}">
									</div>
	                            </div>
	                        </div>
	                        <input type="hidden" name="nasabah_id" value="{{$tabung->NASABAH_ID}}">
	                         <input type="hidden" name="no_rekening" value="{{$no_rekening}}">
	                         <input type="hidden" name="cabang_id" value="{{$cabang->id}}">
	                        <button type="submit" class="btn btn-primary pull-right">Lanjutkan Pendaftaran</button>
	                        <div class="clearfix"></div>
	                    </form>
					@endif
				</div>
			</div>
		</div>				
	</div>
@endsection