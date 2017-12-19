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
              <h3 class="text-center"><span class="badge bg-bmt">1</span></h3>
            </div>
            <div class="card-body text-center">
              <img src="/assets/img/background/shopping-grey.svg" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Jual produkmu dengan menekan tombol jual barang <span class="badge badge-pill badge-success">+</span> pada menu <b>Toko</b>
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
              <img src="/assets/img/penjualan/form-jual.png" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Isi informasi barang yang akan Kamu jual
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
              <img src="/assets/img/background/shopping-grey.svg" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Kamu juga bisa memilih apakah kamu bisa mengantarkan barangmu kepada pembeli atau tidak dengan mencentang <label class="form-check-label"><input type="checkbox" class="form-check-input"> antar</label>. Tarif antar barang dapat langsung kamu tagih ketika barang sampai kepada pembeli sesuai dengan jarak dan barang yang diantarkan.
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
              <img src="/assets/img/background/shopping-grey.svg" class="img-fluid mb-3">
            </div>
            <div class="card-footer">
              Setelah informasi telah terisi lengkap, tekan <button class="btn btn-sm btn-success">JUAL</button> untuk menjual dan menampilkan barangmu.
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
  <section class="pb-5 tutorial">
    <div class="container container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-11">
          <div class="clear-fix">
            <a class="btn btn-success float-left" href="/panduan/layanan"><i class="fa fa-arrow-left fa-fw"></i> Sebelumnya</a>
            <a class="btn btn-success float-right" href="/panduan/edit-produk">Selanjutnya <i class="fa fa-arrow-right fa-fw"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
