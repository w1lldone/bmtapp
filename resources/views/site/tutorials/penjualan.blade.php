@extends ('layouts.simple-master')

@section('breadcrumb')
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="/site">Beranda</a></li>
	  <li class="breadcrumb-item active">Penjualan produk</li>
	</ol>
@endsection

@section('title')
	Penjualan produk
@endsection

@section('content')
  <div class="container container-fluid">
    <h1 class="text-center">Penjualan produk</h1>
  </div>
  <section class="py-5 tutorial">
    <div class="container container-fluid">
      <div class="row">
        <div class="col-12">
          <p>1. Jual produkmu dengan menekan tombol jual barang <span class="badge badge-pill badge-success">+</span></p>
          <p>2. Isi informasi barang yang akan Kamu jual</p>
          <img src="/assets/img/penjualan/form-jual.png" class="img-fluid mb-3">
          <p>3. Kamu juga bisa memilih apakah kamu bisa mengantarkan barangmu kepada pembeli atau tidak dengan mencentang . Tarif antar barang dapat langsung kamu tagih ketika barang sampai kepada pembeli sesuai dengan jarak dan barang yang diantarkan.</p>
          <p>4. Setelah informasi telah terisi lengkap, tekan <button class="btn btn-sm btn-success">JUAL</button> untuk menjual dan menampilkan barangmu.</p>
        </div>
      </div>
    </div>
  </section>
@endsection
