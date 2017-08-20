@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/layanan">Layanan</a></li>

      @if ($layanan->status == 'finished')
      	<li><a href="/layanan?status=selesai">Selesai</a></li>
      @endif

      <li>Detail layanan</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
		@include('layouts.status')
		@if ($layanan->layananDetail->produkLayanan->kat_layanan_id == 3 && $layanan->layananDetail->total == null)
			<div class="alert alert-warning alert-with-icon" data-notify="container">
		        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
		        <i data-notify="icon" class="material-icons">warning</i>
		        <span data-notify="message"><b>Perhatian</b>, pembayaran listrik prabayar memerlukan 2 langkah:</span>
		        <ul>
		        	<li>1. Masukkan info tagihan</li>
		        	<li>2. Selesaikan pembayaran</li>
		        </ul>
		    </div>
		@endif
			<h3 class="pull-left">Detail Layanan # {{ $layanan->kode }} 
				<span class="label label-warning">{{ $layanan->status }}</span>
			</h3>
			<h3 class="pull-right">Dipesan pada {{ $layanan->created_at->toFormattedDateString() }}</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card m-0">
				<div class="card-content">
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<p class="category">Pembayaran</p>
							<h4 style="margin-top: 0px">{{ $layanan->layananDetail->produkLayanan->katLayanan->name }} 
								<br>
								<br>
								<span class="label label-info">{{ $layanan->layananDetail->produkLayanan->name }}</span>
							</h4>
						</div>
						<div class="col-md-4 col-xs-6">
							<p class="category">{{ $layanan->layananDetail->produkLayanan->id == 10 ? "Rekening kredit" : 'Nomer' }}</p>
							<h4 style="margin-top: 0px">{{ $layanan->layananDetail->nomer }}</h4>
						</div>
						<div class="col-md-4 col-xs-6">
							<p class="category">Pembeli</p>
							<h4 style="margin-top: 0px">
								<b>{{ $layanan->nasabah->name }}</b> <br>
								{{ $layanan->nasabah->no_rekening }} <br>
								{{ $layanan->nasabah->kontak }}
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="card m-0">
				<div class="card-content">
					<div class="row">
						<div class="col-sm-6">
							<h4 class="title">Pembayaran</h4>
							@if ($layanan->layananDetail->total == null)
								<p class="text-muted">Harap masukkan informasi tagihan</p>
							@endif
							@if ($layanan->layananDetail->total != null)
								<p>
									Jumlah : <b class="pull-right">Rp. {{ number_format($layanan->layananDetail()->sum('total'),'0',',','.')}} 
										</b><br>
									Biaya : <b class="pull-right">Rp. {{ number_format($layanan->biaya,'0',',','.')}} </b>
									<hr>
									Total : <b class="pull-right">Rp. {{ number_format($layanan->layananDetail()->sum('total')+$layanan->biaya,'0',',','.')}} </b> 
									<br>
								</p>
							@endif
						</div>
						<div class="col-sm-6">
							<h4 class="title">Tindakan</h4>
							@if ($layanan->status == 'pending')
								@if ($layanan->layananDetail->total == null)
									<a class="btn btn-success" rel="tooltip" title="Masukkan info tagihan" data-toggle="modal" data-target="#Bayar"><i class="material-icons">account_balance_wallet</i></a>
								@endif
								@if ($layanan->layananDetail->total != null)
									<a class="btn btn-info" rel="tooltip" title="Selesaikan layanan" data-toggle="modal" data-target="#Selesai"><i class="material-icons">done</i></a>
								@endif
								<a class="btn btn-danger" rel="tooltip" title="Batalkan layanan" data-toggle="modal" data-target="#Batal"><i class="material-icons">clear</i></a>
							@endif
							@if (!empty($layanan->layananDetail->receipt))
								<a class="btn btn-info" target="_blank" href="{{ $layanan->layananDetail->receipt }}" rel="tooltip" title="Bukti pembayaran"><i class="material-icons">receipt</i></a>
							@endif
							<a onclick="history.go(-1)" title="Kembali" rel="tooltip" title="kembali" class="btn btn-warning"><i class="material-icons">arrow_back</i></a>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
@endsection

@section('modal')
	@include('layanan.modal')
@endsection