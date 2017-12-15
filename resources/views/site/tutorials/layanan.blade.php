@extends ('layouts.simple-master')

@section('breadcrumb')
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
	  <li class="breadcrumb-item"><a href="/panduan">Panduan</a></li>
	  <li class="breadcrumb-item active">Pembayaran layanan</li>
	</ol>
@endsection

@section('title')
	Pembayaran layanan
@endsection

@section('content')
	<h1 class="text-center">Pembayaran layanan</h1>
  <span>Kamu bisa membeli beberapa layanan dengan Bi-Mobile, yaitu pembelian Pulsa Token Listrik, Pembayaran Listrik Pascabayar, dan Pembelian Pulsa.</span>
	<section class="py-5 tutorial">
		<div class="row">
			<div class="col-lg-6 col-md-6 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="/assets/img/pembayaran/layanan-awal.png" class="img-fluid mb-3">
            </div>
            <h3 class="text-center"><span class="badge bg-bmt">1</span></h3>
            Buka pembelian layanan pada halaman kategori. 
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 mb-3">
        <div class="card">
          <div class="card-body">
            <img src="/assets/img/pembayaran/form-layanan.png" class="img-fluid mb-3">
            <h3 class="text-center"><span class="badge bg-bmt">2</span></h3>
            Isi informasi pembelian layanan yang dibutuhkan, lalu klik <button class="btn btn-success">Bayar</button> atau <button class="btn btn-success">Beli</button> 
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-3">
        <div class="card">
          <div class="card-body">
            <img src="/assets/img/pembayaran/layanan-password.png" class="img-fluid mb-3">
            <h3 class="text-center"><span class="badge bg-bmt">3</span></h3>
            Pastikan saldo BMT Bina Ummahmu mencukupi, bayar dengan memasukkan password dan tekan OK. 
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-3">
				<div class="card">
					<div class="card-body">
						<img src="/assets/img/pembayaran/riwayat-layanan.png" class="img-fluid mb-3">
						<h3 class="text-center"><span class="badge bg-bmt">5</span></h3>
						Kamu bisa cek riwayat dan proses pembelian layanan pada halaman layanan di dalam menu Transaksi. (<a href="" data-toggle="modal" data-target="#detail">Selengkapnya</a>) 
					</div>
				</div>
			</div>
		</div>
	</section>

	{{-- Modal section --}}
	{{-- Detail riwayat --}}
	<div class="modal" id="detail" tabindex="-1" role="dialog" aria-labelledby="detail">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Cek Riwayat Pembelian</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <p>Kamu bisa melihat riwayat pembelian informasinya dengan menekan salah satu list yang ada pada halaman layanan di dalam menu transaksi. Informasi berupa token, struk, dan informasinya lainnya ada di dalam halaman tersebut.</p>
          <img src="/assets/img/pembayaran/detail-riwayat.png" class="img-fluid mb-3">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
