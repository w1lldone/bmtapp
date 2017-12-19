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
              Jika pembeli sudah melakukan konfirmasi penerimaan barang, Admin akan meneruskan dana penjualan ke rekening BMT Anda.
            </div>
          </div>
        </div>
      </div>
      {{-- Note --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card">
            <div class="card-header  text-center">
              Status transaksi
            </div>
            <div class="card-body">
              Pelajari mengenai status transaksi. Status transaksi terdiri dari Belum dikonfirm, Tersedia, Terbayar, Terkirim, Selesai, dan Batal.
              <ul>
                <li><b>Belum dikonfirm</b>. Barang telah dipesan oleh pembeli dan menunggu konfirmasimu apakah barang masih tersedia atau tidak.</li>
                <li><b>Tersedia</b>. Barang terlah tersedia dan menunggu pembayaran serta persetujuan oleh admin Bi-Mobile.</li>
                <li><b>Terbayar</b>. Admin Bi-Mobile telah membayar dan menyetujui transaksi. Silahkan persiapkan barang yang dipesan oleh pembeli, lalu lakukan konfirmasi barang siap diambil/diantar.</li>
                <li><b>Terkirim</b>. Barang telah diterima oleh pembeli dalam keadaan baik.</li>
                <li><b>Selesai</b>. Uang yang dari pembeli telah masuk ke dalam rekening BMT Bina Ummahmu.</li>
                <li><b>Batal</b>. Barang batal untuk dibeli. Beberapa hal yang membuat barang batal adalah jika kamu mengkonfirmasi bahwa barang <b>tidak tersedia</b> atau jika admin Bi-Mobile tidak menyetujui pembelian karena <b>saldo pembeli kurang</b> dari jumlah yang harus dibayarkan atau hal lainnya.</li>
              </ul>
            </div>
          </div> 
        </div>
      </div>
      {{-- End --}}
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card tutorial-card bg-bmt">
            <div class="card-body">
              Proses jual barang sudah selesai. Mudah, kan? Segera dapatkan Bi-Mobile dan daftarkan akun anda di BMT Binaummah terdekat.
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
            <a class="btn btn-success float-left" href="/panduan/edit-produk"><i class="fa fa-arrow-left fa-fw"></i> Sebelumnya</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
