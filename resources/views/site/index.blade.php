@extends ('layouts.simple-master')

@section('title')
	Bi-Mobile - Belanja semakin mudah
@endsection

@section('content')
	<section class="py-5">
		<div class="container container-fluid">
			<div class="row">
				<div class="col-md-4 text-center">
					<img src="/assets/img/background/shopping.svg" class="img-fluid mb-3">
				</div>
				<div class="col-md-8 d-flex align-items-center">
					<img src="/assets/img/background/slogan.svg" class="img-fluid mb-3">
				</div>
			</div>
		</div>
	</section>
	<section class="py-5">
		<div class="container container-fluid">
			<div class="row justify-content-md-center">
				<div class="col-lg-4 col-md-6 mb-3">
					<div class="card">
						<div class="card-header text-center">
							<h3 class="title">Panduan pembelian</h3>
						</div>
						<div class="card-body">
							<div class="text-center">
								<img src="/assets/img/icons/pembelian.svg" class="mb-3 img-fluid" width="200px"> <br>
							</div>
							Lihat betapa mudahnya transaksi dengan Bi-Mobile!
						</div>
						<div class="card-footer text-center">
							<a href="/panduan/pembelian" class="btn btn-success">Baca panduan</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card">
						<div class="card-header text-center">
							<h3 class="title">Panduan layanan</h3>
						</div>
						<div class="card-body">
							<div class="text-center">
								<img src="/assets/img/icons/layanan.svg" class="mb-3 img-fluid" width="200px"> <br>
							</div>
							Bi-Mobile menyediakan berbagai macam layanan pembayaran.
						</div>
						<div class="card-footer text-center">
							<a href="/panduan/layanan" class="btn btn-success">Baca panduan</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card">
						<div class="card-header text-center">
							<h3 class="title">Panduan penjualan</h3>
						</div>
						<div class="card-body">
							<div class="text-center">
								<img src="/assets/img/icons/penjualan.svg" class="mb-3 img-fluid" width="200px"> <br>
							</div>
							Tingkatkan penjualan produk Anda dengan Bi-Mobile! 
						</div>
						<div class="card-footer text-center">
							<a href="/panduan/penjualan" class="btn btn-success">Baca panduan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  
@endsection
