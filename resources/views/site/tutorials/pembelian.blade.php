@extends ('layouts.simple-master')

@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="/home">Beranda</a></li>
	  <li><a href="/tutorials">Tutorial</a></li>
	  <li>Petunjuk pembelian</li>
	</ol>
@endsection

@section('title')
	Petunjuk pembelian
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">Petunjuk pembelian</h1>
				<section class="py-5">
					<div class="row">
						<div class="col-md-9">
							<ol class="tutorial-list">
								<li>
									Cari produk sesuai kategori atau dari pencarian produk <br>
									<img src="/assets/img/pembelian/cari-produk.png" class="img-fluid rounded" style="width: 35vh">
								</li>
								<li>
									Klik beli <br>
									<img src="/assets/img/pembelian/klik-beli.png" class="img-fluid rounded" style="width: 35vh">
								</li>
								<li>
									Lengkapi informasi pembelian produkmu. Kamu bisa membeli produk lebih dari satu dengan menggunakan keranjang belanja (selengkapnya). Selain itu, kamu dapat menunggu produkmu tiba dengan menggunakan fitur antar* (selengkapnya). <br>
									<img src="/assets/img/pembelian/masuk-keranjang.png" class="img-fluid rounded" style="width: 35vh">
								</li>
								<li>
									Pastikan saldo BMT Bina Ummahmu mencukupi, bayar dengan memasukkan password dan tekan OK. Kamu bisa cek saldo dengan menu fitur cek saldo (selengkapnya) <br>
									<img src="/assets/img/pembelian/input-password.png" class="img-fluid rounded" style="width: 35vh">
								</li>
								<li>
									Konfirmasi terima produk dan tulis review untuk penjual (selengkapnya)
								</li>
							</ol>
						</div>
						<div class="col-md-3" style="position: -webkit-sticky; position: sticky; top: 0">
							<div class="list-group">
							  <a href="#" class="list-group-item list-group-item-action active">Pembelian</a>
							  <a href="#" class="list-group-item list-group-item-action">Layanan pembayaran</a>
							  <a href="#" class="list-group-item list-group-item-action">Penjualan</a>
							  <a href="#" class="list-group-item list-group-item-action">Bayar kredit</a>
							  <a href="#" class="list-group-item list-group-item-action disabled">Cek saldo</a>
							</div>
						</div>
					</div>
				</section>    	
    </div>
  </div>
@endsection
