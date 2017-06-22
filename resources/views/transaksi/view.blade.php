@extends ('layouts.master')

@section('title', 'Detail Transaksi')@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/transaksi">Transaksi</a></li>
		@if ($transaksi->status_kode >= 3)
			<li><a href="/transaksi?status=diproses">Diproses</a></li>
		@endif
		@if ($transaksi->status_kode >= 5)
			<li><a href="/transaksi?status=selesai">Selesai</a></li>
		@endif
		<li>Detail transaksi</li>
	</ol>
@endsection
@section('content')
	<div class="row">
		<div class="col-lg-12 p-2">
			<h3 class="pull-left">Detail Transaksi # {{ $transaksi->kode }} 
			@if ($transaksi->status=='confirmed')
				<span class="label label-warning">siap dibayar</span>
			@endif
			</h3>
			<h3 class="pull-right">Dipesan pada {{ $transaksi->created_at->toFormattedDateString() }}</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 p-2">
			<div class="card" style="margin: 2px;">

			{{-- Bagian Produk --}}
				<div class="card-content">
					@foreach ($transaksi->orderDetail as $orderDetail)
						<div class="row">
							{{-- nomor produk --}}
							<div class="col-md-1">
								<h4 class="">{{ $loop->index + 1 }}</h4>
							</div>

							{{-- keterangan produk --}}
							<div class="col-md-3">
								<h4 class="">{{ $orderDetail->produk->name }}</h4>
								<p >
									Harga : Rp. {{$orderDetail->produk->harga }} / {{ $orderDetail->produk->unit }} <br>
									
								</p>
							</div>

							{{-- Jumlah produk --}}
							<div class="col-md-2">
								<h4 class="">Jumlah</h4>
								<h4 class="">{{$orderDetail->quantity}} {{ $orderDetail->produk->unit }}</h4>
							</div>

							{{-- Total harga --}}
							<div class="col-md-2">
								<h4 class="">Total</h4>
								<h4 class="">Rp. {{ number_format($orderDetail->total,'0',',','.')}}</h4>
							</div>

							{{-- Penjual --}}
							<div class="col-md-2">
								<h4>Penjual </h4>
								<p>	
									{{ $orderDetail->produk->lapak->name }} <br> <b>{{ $orderDetail->produk->lapak->nasabah->no_rekening }}</b><br>
									{{ $orderDetail->produk->lapak->nasabah->kontak }} 
								</p>
							</div>

							<div class="col-md-2">
								<h4>Status</h4>
								<p>
									Sedia : 
									@if ($orderDetail->sedia == null)
										<span class="label label-warning pull-right">Menunggu konfirmasi</span>
									@endif
									@if ($orderDetail->sedia == true)
										<span class="label label-success pull-right">Produk ada</span>
									@endif
									<br>
									Dikirim : 
									@if ($orderDetail->dikirim_at != null)
										<span class="label label-info pull-right">
										{{
											$orderDetail->dikirim_at->toFormattedDateString()
										}}</span>
									@endif
									<br>
									Diterima : 
									@if ($orderDetail->diterima_at != null)
										<span class="label label-info pull-right">
										{{
											$orderDetail->diterima_at->toFormattedDateString()
										}}</span>
									@endif
								</p>
							</div>
						</div>
						@if (!$loop->last)
							<hr>
						@endif
						
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-4 p-2">
			<div class="card" style="margin: 2px;">
				<div class="card-content">
					<h4 class="title">Data Pembeli</h4>
					<p>
						Nama : {{ $transaksi->nasabah->name }} <br>
						Alamat : {{ $transaksi->nasabah->alamat }} <br>
						Kontak : {{ $transaksi->nasabah->kontak }} <br>
						No Rekening : <b>{{ $transaksi->nasabah->no_rekening }}</b><br>
					</p>
					<br>
				</div>
			</div>
			{{-- end card --}}
		</div>
		<div class="col-md-4 p-2 p0-lg">
			<div class="card" style="margin: 2px;">
				<div class="card-content">
					<h4 class="title">Pembayaran</h4>
					<p>
						Jumlah : <b class="pull-right">Rp. {{ number_format($transaksi->orderDetail()->sum('total'),'0',',','.')}} </b><br>
						Biaya : <b class="pull-right">Rp. {{ number_format($transaksi->biaya,'0',',','.')}} </b>
						<hr>
						Total : <b class="pull-right">Rp. {{ number_format($transaksi->orderDetail()->sum('total')+$transaksi->biaya,'0',',','.')}} </b> 
						<br>
					</p>
				</div>
			</div>
			{{-- end card --}}
		</div>
		@if ($transaksi->status_kode<3)
			<div class="col-md-4 p-2">
					<div class="card" style="margin: 2px;">
						<div class="card-content">
							<h4 class="title">Tindakan</h4>
								{{-- <form action="/transaksi/{{$transaksi->id}}/bayar" method="POST">
								{{ csrf_field() }} --}}
									@if ($transaksi->status=='confirmed')
										<a class="btn btn-success" title="Bayar Transaksi" data-toggle="modal" data-target="#Bayar"><i class="material-icons">done</i></a>
									@endif
									<a class="btn btn-danger" title="Batalkan Transaksi" data-toggle="modal" data-target="#Batal"><i class="material-icons">clear</i></a>
									<a onclick="history.go(-1)" title="Kembali" class="btn btn-warning"><i class="material-icons">arrow_back</i></a>
								{{-- </form>					 --}}
						</div>
					</div>
					{{-- end card --}}
				</div>
				{{-- end div --}}
			</div>
		@endif

		@if ($transaksi->status_kode>2 && $transaksi->status_kode<6)
			<div class="col-md-4 p-2">
					<div class="card" style="margin: 2px;">
						<div class="card-content">
							<h4>Tindakan</h4>
							@if ($transaksi->status_kode==4)
								<button title="Transaksi Selesai" data-toggle="modal" data-target="#Selesai" class="btn btn-info"><i class="material-icons">done</i></button>
							@endif
							<a class="btn btn-warning" onclick="history.go(-1)"><i class="material-icons">arrow_back</i></a>
						</div>
					</div>
					{{-- end card --}}
				</div>
				{{-- end div --}}
			</div>
		@endif
		{{-- end div --}}
		
	
@endsection

@section('modal')
	@include('transaksi.modal')
@endsection
