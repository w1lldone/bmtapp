<div class="row justify-content-center sticky-top tutorial-nav">
  <div class="col-lg-8">
    <div class="card tutorial-card">
      <nav class="nav nav-pills nav-fill">
        <a class="nav-item nav-link @if (Route::currentRouteName() == 'panduan.penjualan'){{ 'active' }} @endif" href="/panduan/penjualan">Jual produk</a>
        <a class="nav-item nav-link @if (Route::currentRouteName() == 'panduan.produk.edit'){{ 'active' }} @endif" href="#">Ubah info produk</a>
        <a class="nav-item nav-link @if (Route::currentRouteName() == 'panduan.transaksi'){{ 'active' }} @endif" href="/panduan/transaksi">Kelola transaksi</a>
      </nav>
    </div>
  </div>
</div>