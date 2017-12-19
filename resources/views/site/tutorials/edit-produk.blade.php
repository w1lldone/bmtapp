@extends ('layouts.simple-master')

@section('title')
	Edit produk
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
              <h3 class="text-center"><span class="badge bg-bmt">1</span></h3>
            </div>
            <div class="card-body text-center">
              <img src="/assets/img/penjualan/toko.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Kamu bisa ubah informasi produkmu dengan cara mencari produkmu dengan menggunakan fitur pencarian atau bisa kamu lihat di dalam list produk pada menu <b>Toko</b>
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
              <img src="/assets/img/penjualan/detail-produk.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Kemudian pilih salah satu produkmu hingga muncul halaman detil informasi barang
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
            <div class="card-body">
              Di dalam halaman ini, kamu bisa menentukan apakah barangmu bisa dilihat orang lain atau tidak dengan mengubah status <img src="/assets/img/penjualan/toggle.png" style="width: 150px">.
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
            <div class="card-body">
              Untuk melanjutkan untuk mengubah informasi barang, kamu bisa tekan tombol <button class="btn btn-success btn-sm">Ubah informasi barang</button>.
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
              <img src="/assets/img/penjualan/edit-produk.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Tunggu hingga semua informasi barangmu muncul dan ubah informasi sesuai dengan yang kamu inginkan.
            </div>
          </div>
        </div>
      </div>
      {{-- 6 --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card">
            <div class="card-header">
              <h3 class="text-center"><span class="badge bg-bmt">5</span></h3>
            </div>
            <div class="card-body">
              Apabila kamu yakin dengan informasi yang telah kamu ubah, kamu dapat menekan tombol <button class="btn btn-success btn-sm">Ubah informasi produk</button>.
            </div>
          </div>
        </div>
      </div>
      {{-- next --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card">
            <div class="card-body">
              Supaya produkmu dapat terjual dengan baik, pelajari tahapan mengelola transaksi penjualan pada Bi-Mobile. Klik selanjutnya untuk membaca panduan <b>kelola transaksi</b>.
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>

  {{-- NEXT PAGE  --}}
  <section class="pb-5 tutorial">
    <div class="container container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-11">
          <div class="clear-fix">
            <a class="btn btn-success float-left" href="/panduan/penjualan"><i class="fa fa-arrow-left fa-fw"></i> Sebelumnya</a>
            <a class="btn btn-success float-right" href="/panduan/transaksi">Selanjutnya <i class="fa fa-arrow-right fa-fw"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
