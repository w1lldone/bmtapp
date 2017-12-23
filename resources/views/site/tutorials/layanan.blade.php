@extends ('layouts.simple-master')

@section('title')
	Panduan layanan pembayaran
@endsection

@section('content')
  <section class="pt-5">
    <div class="container">
      <h1 class="text-center m-0">Panduan layanan pembayaran</h1>
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
              <img src="/assets/img/pembayaran/layanan-awal.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Buka pembelian layanan pada halaman kategori. Bi-Mobile menyediakan tiga layanan pembayaran untuk Kamu, yaitu:
              <ul>
                <li>Pembelian pulsa token listrik</li>
                <li>Pembayaran listrik pascabayar</li>
                <li>Pembelian pulsa</li>
              </ul>
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
              <img src="/assets/img/pembayaran/form-layanan.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Isi informasi pembelian layanan yang dibutuhkan, lalu klik <button class="btn btn-success">Bayar</button> atau <button class="btn btn-success">Beli</button> 
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
              <img src="/assets/img/pembayaran/layanan-password.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Pastikan saldo BMT Bina Ummahmu mencukupi, bayar dengan memasukkan password dan tekan OK. 
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
              <img src="/assets/img/pembayaran/riwayat-layanan.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Kamu bisa cek riwayat dan proses pembelian layanan pada halaman layanan di dalam menu Transaksi. (<a href="" data-toggle="modal" data-target="#detail">Selengkapnya</a>) 
            </div>
          </div>
        </div>
      </div>
      {{-- NOTES --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card">
            <div class="card-body">
              Jual produk anda di Bi-Mobile! Dapatkan lebih banyak konsumen dan keuntungan berlipat. Klik selanjutnya untuk melihat panduan penjualan.
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
            <a class="btn btn-success float-left" href="/panduan/pembelian"><i class="fa fa-arrow-left fa-fw"></i> Sebelumnya</a>
            <a class="btn btn-success float-right" href="/panduan/penjualan">Selanjutnya <i class="fa fa-arrow-right fa-fw"></i></a>
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
