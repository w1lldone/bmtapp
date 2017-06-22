@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/transaksi">Transaksi</a></li>
		<li>Diproses</li>
	</ol>
@endsection

@section('content')

	<div class="row">
		
	</div>
	<div class="row">
		<div class="col-md-6 col-lg-6 col-md-offset-3 pr-0 pl-0">
		@include('layouts.errors')
		@include('layouts.status')

		<ul class="nav nav-tabs" background="bmt-green" style="padding-right: 0;">
		  <li role="presentation" ><a onclick="loading()" href="/transaksi">Siap Bayar</a></li>
		  <li role="presentation" class="active"><a onclick="loading()" href="/transaksi/diproses">Diproses</a></li>
		  <li role="presentation"><a onclick="loading()" href="/transaksi/selesai">Selesai</a></li>
		  {{-- SETTINGS --}}
  		  <li class="pull-right" role="presentation"><a rel="tooltip" title="Biaya transaksi" onclick="loading()" href="/biaya"><i class="material-icons">settings</i></a></li>
		</ul>

		<div class="card card-plain" style="margin-bottom: 5px">
			<div class="card-header" data-background-color="bmt-green">
				<h4 class="title">Transaksi Diproses</h4>
				<p class="category">Klik pada kartu untuk melihat detail transaksi</p>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 " style="padding: 2px">
			<div class="card" style="margin: 2px">
					<div class="card-content">
						<a data-toggle="collapse" href="#collapseExample">
							<div class="row">
								<div class="col-xs-10">
									<ul class="list-inline category">
										<li>Urut: <span class="label label-info">{{ $request->urutkan }}</span></li>
										<li>Filter: <span class="label label-info">{{ $request->show }}</span></li>
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
				                              <option value="butuh tindakan">butuh tindakan</option>
											  <option value="terbaru">terbaru</option>     
				                              <option value="terlama">terlama</option>     
											</select>
										</div>
									</div>
									<div class="col-md-4 col-xs-6">
										<div id="filter" class="form-group">
											<p class="category">Filter</p>
											<select name="filter" class="form-control">
											  <option value="semua-p">semua</option>		
											  <option value="diterima">diterima</option>		
											  <option value="diproses">diproses</option>		
											</select>
										</div>
									</div>
									<div class="col-md-5 col-xs-12">
										<div class="form-group">
											<p class="category">Kata kunci</p>
									    	<input id="keyword" name="keyword" type="text" placeholder="nasabah/kode transaksi" class="form-control" />
									    	<a href="/transaksi/diproses" class="btn btn-warning"><i class="material-icons">refresh</i></a>
											<button onclick="loading()" class="btn btn-info pull-right" type="submit"><i class="material-icons">send</i></button>
										</div>
									</div>
{{-- 										<div class="col-md-5 col-xs-6">
										<button class="btn btn-info pull-right" type="submit"><i class="material-icons">send</i></button>
									</div> --}}
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
					@if ($transaksis->isEmpty())
						<div class="card-content">
	                        <div class="text-center">
		                        <i class="material-icons text-muted" style="font-size: 100px; margin-top: 20px; opacity: 0.5;">shopping_cart</i>
	                            <h4 class="text-muted">Belum ada transaksi diproses</h4>
	                        </div>
                        </div>
                    @endif
					@foreach ($transaksis as $transaksi)
						<div class="card-content card-link">
							<a href="/transaksi/{{$transaksi->kode}}">
								<p class="pull-right">{{ $transaksi->updated_at->diffForHumans()}}</p>
								<h4 class="title"># {{ $transaksi->kode }}
									@if ($transaksi->status_kode == 3)
									 	<span class="label label-success">Diproses</span>
									@endif
									@if ($transaksi->status_kode == 4)
									 	<span class="label label-info">Diterima</span>
									@endif 
									{{-- <span class="label label-success">Lunas</span> --}}
								</h4>
								<p class="category">{{ $transaksi->nasabah->name }}
								<span class="text-success">Rp. {{ number_format($transaksi->orderDetail()->sum('total'),'0',',','.')}} </span>
								</p>
							</a>
						</div>	
					@endforeach
					{{$transaksis->links()}}
				</div>
			</div>
		</div>
	</div>   
@endsection

@section('script')
	@include('transaksi.script')
@endsection