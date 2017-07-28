@extends ('layouts.master')

@section('breadcrumb')
    <ol class="breadcrumb">
      <li>Beranda</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 p-2">
            @include('layouts.status')
            @include('layouts.errors')
        </div>
        <div class="col-sm-4 p-2">
            <div class="card card-plain">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Pintasan</h4>
                </div>
                <div class="card-content" style="padding-right: 0; padding-left: 0;">
                    <div class="list-group" style="margin-bottom: 0;">
                      <button data-toggle="modal" data-target="#CekRekening" type="button" class="list-group-item list-icons">
                          <div class="items"><i background="bmt-green" style="box-shadow: none" class="material-icons circle">person</i></div>
                          <div class="items"><h4>Mendaftarkan nasabah</h4></div>
                      </button>
                      <button data-toggle="modal" data-target="#newKategori" type="button" class="list-group-item list-icons">
                        <div class="items"><i background="blue" style="box-shadow: none" class="material-icons circle">store</i></div>
                        <div class="items"><h4>Tambah kategori</h4></div>
                      </button>
                      <a href="/kategori/layanan/create" type="button" class="list-group-item list-icons">
                        <div class="items"><i background="orange" style="box-shadow: none" class="material-icons circle">account_balance_wallet</i></div>
                        <div class="items"><h4>Tambah Layanan</h4></div>
                      </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- BAYAR KREDIT --}}
        <div class="col-sm-4 p-2">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                  <h4 class="title">Pengingat Pembayaran Kredit</h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-lg-12">
                          <form action="/nasabah/create" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Masukkan tanggal</label>
                                      <input class="form-control" id="date" name="date" type="text"/>
                                  </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success pull-right">Proses</button>
                            <div class="clearfix"></div>
                          </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 p-2">
            <div class="card" style="height: 100%">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Biaya Transaksi</h4>
                </div>
                <div class="card-content">
                    <div class="row" style="display: flex; align-items: center;">
                        <div class="col-xs-6">
                            <h4 style="font-size: 3rem">Rp.{{ $biaya->nominal }}</h4>
                        </div>
                        <div class="col-xs-6">
                            <a href="/biaya" rel="tooltip" title="Ubah biaya" class="btn btn-round btn-success btn-just-icon pull-right"><i class="material-icons">mode_edit</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> diupdate {{ $biaya->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-lg-6 col-md-12 p-2">
			<div class="card">
                <div class="card-header" data-background-color="bmt-green">
                    <h4 class="title">Transaksi Terbaru</h4>
                    <p class="category">Klik pada kode transaksi untuk memberi tindakan</p>
                </div>
                <div class="card-content table-responsive">
                    @if ($orders->isEmpty())
                        <div class="text-center">
                            <img src="/uploads/images/logo/logo-greyscale.svg" style="height: 100px; margin-top: 20px">
                            <h4 class="text-muted">Belum ada transaksi </h4>
                        </div>
                    @endif
                    <table class="table table-hover">
                        <tbody>
	                        @foreach ($orders as $order)
		                        <tr>
		                        	<td>{{ $loop->index + 1 }}</td>
		                        	<td><a href="/transaksi/{{$order->kode}}">{{ $order->kode }}</a></td>
		                        	<td>
                                        <span class="label label-info">{{ $order->status }}</span>
                                    </td>
		                        	<td>{{ $order->updated_at->diffForHumans() }}</td>
		                        </tr>
	                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
        			<div class="center">
        				<a href="/transaksi">lihat semua <i class="material-icons">arrow_forward</i></a>
        			</div>
        		</div>
            </div>
		</div>


		<div class="col-lg-6 col-md-12 p-2">
			<div class="card">
                <div class="card-header" data-background-color="bmt-green">
                    <h4 class="title">Pembayaran layanan terbaru</h4>
                    <p class="category">Klik pada kode pembayaran untuk memberi tindakan</p>
                </div>
                <div class="card-content table-responsive">
                	@if ($layanans->isEmpty())
                		<div class="text-center">
                            <img src="/uploads/images/logo/logo-greyscale.svg" style="height: 100px; margin-top: 20px">
                			<h4 class="text-muted">Belum ada pembayaran </h4>
                		</div>
                	@endif
                    <table class="table table-hover">
                        <tbody>
	                        @foreach ($layanans as $layanan)
		                        <tr>
		                        	<td>{{ $loop->index + 1 }}</td>
		                        	<td><a href="/layanan/{{$layanan->kode}}">{{ $layanan->kode }}</a></td>
		                        	<td>
	                        			<span class="label label-info">{{ $layanan->status }}</span>
	                        		</td>
		                        	<td>{{ $layanan->updated_at->diffForHumans() }}</td>
		                        </tr>
	                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="center">
                        <a href="/layanan">lihat semua <i class="material-icons">arrow_forward</i></a>
                    </div>
                </div>
            </div>
		</div>
	
	</div>
@endsection

@section('modal')
    @include('layouts.modals')
@endsection

@section('script')
  <script>
      $(document).ready(function(){
          var date_input=$('input[name="date"]'); //our date input has the name "date"
          date_input.datepicker({
              format: 'yyyy-mm-dd',
              todayHighlight: true,
              autoclose: true,
          })
      })
  </script>
@endsection