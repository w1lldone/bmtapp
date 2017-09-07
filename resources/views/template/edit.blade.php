@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/reminder">Reminder</a></li>
		<li class="breadcrumb-item active">Edit template</li>
	</ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			@include('layouts.status')
			<div class="card">
        <div class="card-header" data-background-color="bmt-green">
            <h4 class="title">Edit template reminder kredit</h4>
        </div>
				<div class="card-content">
					<form method="POST" action="/template/{{ $template->id }}">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="row">
						  <div class="col-lg-12">
						    <div class="form-group {{ $errors->has('head') ? ' has-error' : '' }}">
								  <label class="control-label">Pembuka</label>
								  <textarea name="head" class="form-control">{{ $template->head }}</textarea>
							  </div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-12">
						    <div class="form-group">
								  <ul>
								  	<li>Nama:</li>
								  	<li>Rekening kredit:</li>
								  	<li>Cicilan ke:</li>
								  	<li>Nominal cicilan:</li>
								  </ul>
							  </div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-12">
						    <div class="form-group {{ $errors->has('foot') ? ' has-error' : '' }}">
								  <label class="control-label">Penutup</label>
								  <textarea name="foot" class="form-control">{{ $template->foot }}</textarea>
							  </div>
						  </div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<p class="text-muted">
									<strong>Catatan</strong> <br>
									<li>Hanya bagian <strong>pembuka</strong> dan <strong>penutup</strong> yang dapat dirubah.</li>
									<li>_tanggal_: Kode tanggal. Otomatis diganti dengan tanggal pembayaran. </li>
									<li><code><span><</span><span>b></span><span><</span><span>/b></span></code>: Tulisan dibuat cetak tebal.</li>
								</p>
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

@section('script')
	<script type="text/javascript">
		$(function(){
			$("#cabang_id").val("{{ $template->cabang_id }}");
		});
	</script>
@endsection
