{{-- modal Bayar --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="Bayar" tabindex="-1" role="dialog" aria-labelledby="BayarLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title ">Konfirmasi Pembayaran Transaksi # <span class="label label-success">{{ $transaksi->kode }}</span></h4>
	        <hr>
	        <form action="/transaksi/{{$transaksi->id}}/bayar" method="POST">
				{{ csrf_field() }}
                <div class="row">
                	<div class="col-md-6">
						<p>
							Nama : <b class="pull-right">{{ $transaksi->nasabah->name }}</b> <br>
							Alamat : <b class="pull-right">{{ $transaksi->nasabah->alamat }}</b> <br>
							Kontak : <b class="pull-right">{{ $transaksi->nasabah->kontak }}</b> <br>
							No Rekening : <b class="pull-right">{{ $transaksi->nasabah->no_rekening }}</b><br>
						</p>
                    </div>
                    <div class="col-md-6">
						<p>
						Jumlah : <b class="pull-right">Rp. {{ number_format($transaksi->orderDetail()->sum('total'),'0',',','.')}} </b><br>
						Biaya : <b class="pull-right">Rp. {{ number_format($transaksi->biaya,'0',',','.')}} </b>
						<hr>
						Total : <b class="pull-right">Rp. {{ number_format($transaksi->orderDetail()->sum('total')+$transaksi->biaya,'0',',','.')}} </b>
					</p>
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Bayar Transaksi</button>
                {{-- <a type="button" class="btn btn-warning pull-right" data-dismiss="modal" aria-label="Tutup">Tutup</a> --}}
                <div class="clearfix"></div>
            </form>
	      
	      </div>
	      {{-- <div class="modal-body"></div> --}}
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

{{-- modal Batal --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="Batal" tabindex="-1" role="dialog" aria-labelledby="BatalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-danger">Anda Yakin Akan Membatalkan Transaksi # <span class="label label-warning">{{ $transaksi->kode }}</span></h4>
	        <p class="text-muted">Masukkan pesan pembatalan</p>
	      </div>
	      <div class="modal-body">
	        <form action="/transaksi/{{$transaksi->id}}/batal" method="POST">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
                <div class="row">
                	<div class="col-md-12">
						<div class="form-group">
							<div class="col-md-12">
								<input type="text" class="form-control" name="pesan" required placeholder="Pesan untuk nasabah">
							</div>
						</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger pull-right">Batalkan Transaksi</button>
                <a type="button" class="btn btn-warning pull-right" data-dismiss="modal" aria-label="Tutup">Tutup</a>
                <div class="clearfix"></div>
            </form>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	{{-- modal Selesai --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="Selesai" tabindex="-1" role="dialog" aria-labelledby="SelesaiLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title ">Konfirmasi Penyelesaian Transaksi # <span class="label label-info">{{ $transaksi->kode }}</span></h4>
	        <br>
	        <form action="/transaksi/{{$transaksi->id}}/selesai" method="POST">
				{{ csrf_field() }}
                <div class="row">
                	<div class="col-md-12">
                	
						<table class="table table-responsive">
							<thead class="text-info">
								<th>Penjual</th>
								<th>No Rekening</th>
								<th>Kontak</th>
								<th>Jumlah</th>
							</thead>
							<tbody>
								@foreach ($transaksi->orderDetail as $orderDetail)
									<tr>
										<td>{{$orderDetail->produk->lapak->name}}</td>
										<td>{{$orderDetail->produk->lapak->nasabah->no_rekening}}</td>
										<td>{{$orderDetail->produk->lapak->nasabah->kontak}}</td>
										<td>Rp. {{number_format($orderDetail->total,'0',',','.')}}</td>
									</tr>
								@endforeach
									<tr>
										<td class="text-info">Total</td>
										<td></td>
										<td></td>
										<td class="text-info">Rp. {{ number_format($transaksi->orderDetail()->sum('total'),'0',',','.')}}</td>
									</tr>
							</tbody>
						</table>

					
{{-- 						<p>
							Jumlah : <b class="pull-right">Rp. {{ number_format($transaksi->orderDetail()->sum('total'),'0',',','.')}} </b><br>
							Biaya : <b class="pull-right">Rp. {{ number_format($transaksi->biaya,'0',',','.')}} </b>
							<hr>
							Total : <b class="pull-right">Rp. {{ number_format($transaksi->orderDetail()->sum('total')+500,'0',',','.')}} </b>

						</p> --}}
                    </div>
                </div>
                <button type="submit" class="btn btn-info pull-right">Transaksi Selesai</button>
                {{-- <a type="button" class="btn btn-warning pull-right" data-dismiss="modal" aria-label="Tutup">Tutup</a> --}}
                <div class="clearfix"></div>
            </form>
	      
	      </div>
	      {{-- <div class="modal-body"></div> --}}
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->