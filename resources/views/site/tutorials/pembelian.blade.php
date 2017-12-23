@extends ('layouts.simple-master')

@section('breadcrumb')
	{{-- <ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="/site">Beranda</a></li>
	  <li class="breadcrumb-item active">Panduan pembelian</li>
	</ol> --}}
@endsection

@section('title')
	Panduan pembelian
@endsection

@section('content')
	<section class="pt-5">
	  <div class="container">
	    <h1 class="text-center m-0">Panduan pembelian produk</h1>
	  </div>
	</section>

	<section class="py-5 tutorial">
		<div class="container">
			{{-- 1 --}}
			<div class="row justify-content-center">
			  <div class="col-lg-8">
			    <div class="card tutorial-card">
			      <div class="card-header">
			        <h3 class="text-center"><span class="badge bg-bmt">1</span></h3>
			      </div>
			      <div class="card-body text-center">
			        <img src="/assets/img/pembelian/cari-produk.png" class="img-fluid mb-3">
			      </div>
			      <div class="card-footer">
			      	Cari produk sesuai kategori atau dari pencarian produk. 
			      </div>
			    </div>
			  </div>
			</div>
			{{-- 2 --}}
			<div class="row justify-content-center">
			  <div class="col-lg-8">
			    <div class="card tutorial-card">
			      <div class="card-header">
			        <h3 class="text-center"><span class="badge bg-bmt">2</span></h3>
			      </div>
			      <div class="card-body text-center">
			        <img src="/assets/img/pembelian/klik-beli.png" class="img-fluid mb-3">
			      </div>
			      <div class="card-footer">
			      	Klik beli.
			      </div>
			    </div>
			  </div>
			</div>
			{{-- 3 --}}
			<div class="row justify-content-center">
			  <div class="col-lg-8">
			    <div class="card tutorial-card">
			      <div class="card-header">
			        <h3 class="text-center"><span class="badge bg-bmt">3</span></h3>
			      </div>
			      <div class="card-body text-center">
			        <img src="/assets/img/pembelian/masuk-keranjang.png" class="img-fluid mb-3">
			      </div>
			      <div class="card-footer">
			      	Lengkapi informasi pembelian produkmu. Kamu bisa membeli produk lebih dari satu dengan menggunakan keranjang belanja (<a href="" data-toggle="modal" data-target="#keranjang">selengkapnya</a>). Selain itu, kamu dapat menunggu produkmu tiba dengan menggunakan fitur antar* (<a href="" data-toggle="modal" data-target="#antar">selengkapnya</a>).
			      </div>
			    </div>
			  </div>
			</div>
			{{-- 4 --}}
			<div class="row justify-content-center">
			  <div class="col-lg-8">
			    <div class="card tutorial-card">
			      <div class="card-header">
			        <h3 class="text-center"><span class="badge bg-bmt">4</span></h3>
			      </div>
			      <div class="card-body text-center">
			      	<img src="/assets/img/pembelian/input-password.png" class="img-fluid mb-3 text-center">
			      </div>
			      <div class="card-footer">
			      	Pastikan saldo BMT Bina Ummahmu mencukupi, bayar dengan memasukkan password dan tekan OK. Kamu bisa cek saldo dengan menu fitur cek saldo (<a href="" data-toggle="modal" data-target="#cekSaldo">selengkapnya</a>).
			      </div>
			    </div>
			  </div>
			</div>
			{{-- 5 --}}
			<div class="row justify-content-center">
			  <div class="col-lg-8">
			    <div class="card tutorial-card">
			      <div class="card-header">
			        <h3 class="text-center"><span class="badge bg-bmt">5</span></h3>
			      </div>
			      <div class="card-body text-center">
			      	<img src="/assets/img/pembelian/konfirmasi.png" class="img-fluid mb-3">
			      </div>
			      <div class="card-footer">
			      	Konfirmasi terima produk dan tulis review untuk penjual (<a href="" data-toggle="modal" data-target="#konfirmasi">selengkapnya</a>).
			      </div>
			    </div>
			  </div>
			</div>
			{{-- NOTES --}}
			<div class="row justify-content-center">
			  <div class="col-lg-8">
			    <div class="card tutorial-card">
			      <div class="card-body">
			      	Selain belanja produk sesama nasabah, Bi-Mobile juga menyediakan banya fasilitas pembayaran, seperti bayar listrik dan beli pulsa. Klik selanjutnya untuk membaca panduan layanan pembayaran.
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</section>

	{{-- NEXT PAGE  --}}
	<section class="pb-5 tutorial">
	  <div class="container">
	    <div class="row justify-content-center">
	      <div class="col-lg-10 col-md-11">
	        <div class="clear-fix">
	          <a class="btn btn-success float-right" href="/panduan/layanan">Selanjutnya <i class="fa fa-arrow-right fa-fw"></i></a>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>

	{{-- Modal section --}}
	{{-- KERANJANG --}}
	<div class="modal" id="keranjang" tabindex="-1" role="dialog" aria-labelledby="keranjang">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Keranjang belanja</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Kamu dapat memesan lebih dari satu produk dari penjual dengan Keranjang Belanja. Perhitungan harga produk akan disatukan untuk setiap Keranjang Belanja. Untuk menambah produk ke dalam Keranjang Belanja, kamu cukup menekan tombol <button class="btn btn-success" style="font-size: 60%">KEMBALI BELANJA</button>  yang ada di setiap halaman produk penjual.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	{{-- ANTAR --}}
	<div class="modal" id="antar" tabindex="-1" role="dialog" aria-labelledby="antar">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Antar produk</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Beberapa penjual akan memberikan fitur antar pada produk yang dijual. Jika fitur ini tersedia maka di dalam spesifikasi produk akan tertera informasi bahwa barang dapat diantarkan. Dengan centang 
	        	<label class="form-check-label">
      				<input type="checkbox" class="form-check-input">
    					antar
    				</label> 
    			maka penjual akan mengirimkan barangnya ke alamat sesuai yang tercantum pada alamat di dalam profilmu. Tarif pengiriman barang akan diminta langsung oleh penjual ketika barang sampai sesuai dengan jarak toko dengan alamatmu.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	{{-- CEK SALDO --}}
	<div class="modal" id="cekSaldo" tabindex="-1" role="dialog" aria-labelledby="cekSaldo">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Cek saldo</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Cek saldo dapat kamu lakukan dengan membuka halaman profil dan menekan tombol <img src="/assets/img/pembelian/tombol-cek-saldo.png"> . Fitur ini dapat kamu nikmati pada saat jam kerja yaitu mulai pukul 08.00 hingga 15.00.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	{{-- KONFIRMASI --}}
	<div class="modal" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasi">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Konfirmasi terima produk dan tulis review</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Konfirmasi terima produk dapat kamu lakukan setelah produk benar-benar kamu terima di dalam halaman detil informasi pembelian. Setelah melakukan konfirmasi, berikan ulasan atau review untuk pelapak sesuai dengan penilaianmu terhadap barang yang kamu terima. Ulasan yang kamu berikan akan berguna untuk penjual dan pembeli lain.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
