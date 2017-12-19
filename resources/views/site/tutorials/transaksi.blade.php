@extends ('layouts.simple-master')

@section('title')
  Penjualan produk
@endsection

@section('content')

  <section class="pt-5 tutorial">
    <div class="container container-fluid">
      <h1 class="text-center m-0">Panduan jual produk</h1>
    </div>
  </section>

  <section class="py-5 tutorial">
    <div class="container container-fluid">
      @include('site.tutorials.penjualan-nav')
      {{-- 1 --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card">
            <div class="card-header">
              <h3 class="text-center">Pendahuluan</h3>
            </div>
            <div class="card-body">
              Pengelolaan transaksi penjualan melibatkan 3 hal:
              <ol>
                <li>Konfirmasi ketersediaan</li>
                <li>Konfirmasi barang dikirim</li>
                <li>Produk diterima</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      {{-- 1 --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card">
            <div class="card-header">
              <h3 class="text-center"><span class="badge bg-bmt">1</span></h3>
            </div>
            <div class="card-body text-center">
              <img src="/assets/img/penjualan/transaksi-penjualan.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Jika ada yang membeli produk, Anda akan menerima notifikasi penjualan. Masuk menu <strong>Transaksi</strong>, lalu pilih tab <strong>Penjualan</strong>
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
              <img src="/assets/img/penjualan/konfirmasi-sedia.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Lakukan konfirmasi ketersediaan produk dengan mencari penjualan berstatus <strong>Belum dikonfirm</strong>, tekan untuk masuk ke detail penjualan, lalu tekan <button class="btn btn-success">Konfirmasi ketersediaan barang</button>. Jika selama 12 jam tidak ada konfirmasi, penjualan akan dibatalkan.
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
              <img src="/assets/img/penjualan/konfirmasi-kirim.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Setelah menerima notifikasi pesanan sudah dibayar, status penjualan berubah mejadi <strong>Terbayar</strong>. Anda diminta menyiapkan produk lalu konfirmasi pengiriman dengan memencet <button class="btn btn-success">Konfirmasi barang diambil/dikirm</button> pada detail penjualan.
            </div>
          </div>
        </div>
      </div>
      {{-- next --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card">
            <div class="card-body">
              Selamat! Anda telah berhasil menjual barang di Bi-Mobile. Klik selanjutnya untuk membaca panduan <strong>kelola transaksi</strong>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>

  {{-- NEXT PAGE  --}}
  <section class="py-5 tutorial">
    <div class="container container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-11">
          <div class="clear-fix">
            <a class="btn btn-success float-left" href="/panduan/penjualan"><i class="fa fa-arrow-left fa-fw"></i> Sebelumnya</a>
            <a class="btn btn-success float-right" href="/panduan/edit-produk">Selanjutnya <i class="fa fa-arrow-right fa-fw"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
