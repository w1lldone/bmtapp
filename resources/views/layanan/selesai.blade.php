@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/layanan">Layanan</a></li>
		<li>Selesai</li>
	</ol>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-lg-6 col-md-offset-3 pr-0 pl-0">
		@include('layouts.errors')
		@include('layouts.status')

		<ul class="nav nav-tabs" background="blue" style="padding-right: 0;">
			<li role="presentation" ><a onclick="loading()" href="/layanan">Siap Bayar</a></li>
			<li role="presentation" class="active"><a onclick="loading()" href="/layanan/selesai">Selesai</a></li>
			{{-- SETTINGS --}}
  		  <li class="pull-right" role="presentation"><a rel="tooltip" title="Biaya transaksi" onclick="loading()" href="/biaya"><i class="material-icons">settings</i></a></li>
		</ul>

		<div class="card card-plain" style="margin-bottom: 5px">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Layanan selesai</h4>
				<p class="category">Klik pada kartu untuk melihat detail layanan</p>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 " style="padding: 2px">
			<div class="card" style="margin: 2px">
				<div class="card-content">
					<a data-toggle="collapse" href="#collapseExample">
						<div class="row">
							<div class="col-xs-10">
								<ul class="list-inline category">
									<li>Urut: <span class="label label-info">{{ $request->urutkan}}</span></li>
									<li>Filter: <span class="label label-info">{{ $request->kategori }}</span></li>
									<li>Kata kunci: <span class="label label-info">{{ $request->keyword }}</span></li>
								</ul>
							</div>
							<div class="col-xs-2">
								<i class="material-icons pull-right">keyboard_arrow_down</i>
							</div>
						</div>
					</a>
					
					
					<div class="collapse {{ $request->collapse }}" id="collapseExample">
						<form method="GET">
							<div class="row">
								<div class="col-md-3 col-xs-6">
									<div id="urutkan" class="form-group">
										<p class="category">Urutkan</p>
										<select name="urutkan" class="form-control">
										  <option value="terbaru">terbaru</option>     
			                              <option value="terlama">terlama</option>     
										</select>
									</div>
								</div>
								<div class="col-md-4 col-xs-6">
									<div id="filter" class="form-group">
										<p class="category">Filter</p>
										<select name="filter" class="form-control">
										  <option value="semua-f">semua</option>
										  <option>selesai</option>
										  <option>batal</option>
										</select>
									</div>
								</div>
								<div class="col-md-5 col-xs-12">
									<div class="form-group">
										<p class="category">Kata kunci</p>
								    	<input id="keyword" name="keyword" type="text" placeholder="nasabah/kode transaksi" class="form-control" />
								    	<a href="/layanan/selesai" class="btn btn-warning"><i class="material-icons">refresh</i></a>
										<button onclick="loading()" class="btn btn-info pull-right" type="submit"><i class="material-icons">send</i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="spinner spinner-big text-center" style="margin: 50px; display: none;">
	          <div class="bounce1"></div>
	          <div class="bounce2"></div>
	          <div class="bounce3"></div>
	        </div>
			<div id="content" class="card" style="margin: 2px;">
				@if ($layanans->isEmpty())
					<div class="card-content">
						<div class="text-center">
							<i class="material-icons text-muted" style="font-size: 100px; margin-top: 20px; opacity: 0.5;">account_balance_wallet</i>
							<h4 class="text-muted">Belum ada layanan selesai</h4>
						</div>	
					</div>
				@endif
				@foreach ($layanans as $layanan)
					<div class="card-content card-link">
						<a href="/layanan/{{$layanan->kode}}">
							<p class="pull-right">{{ $layanan->updated_at->diffForHumans()}} <br> <span class="label label-primary">{{ $layanan->status }}</span></p>
							<h4 class="title"># {{ $layanan->kode }}</h4>
							<p class="category">{{ $layanan->nasabah->name }}
								<span class="text-success">Rp. {{ number_format($layanan->layananDetail()->sum('total'),'0',',','.')}} </span> <br>
								<span class="label label-info">{{ $layanan->layananDetail->produkLayanan->katLayanan->name }}</span>
							</p>
						</a>
					</div>
				@endforeach
				{{ $layanans->links() }}
			</div>
		</div>
	</div>
</div>   
@endsection

@section('script')
	@include('layanan.script')
@endsection