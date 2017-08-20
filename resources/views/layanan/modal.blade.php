{{-- modal Selesai --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="Selesai" tabindex="-1" role="dialog" aria-labelledby="SelesaiLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title ">Konfirmasi Penyelesaian Layanan # <span class="label label-info">{{ $layanan->kode }}</span></h4>
	        <hr>
	        <form action="/layanan/{{$layanan->id}}/selesai" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="row">
                	<div class="col-md-6">
						<p>
							Nama : <b class="pull-right">{{ $layanan->nasabah->name }}</b> <br>
							Alamat : <b class="pull-right">{{ $layanan->nasabah->alamat }}</b> <br>
							No Rekening : <b class="pull-right">{{ $layanan->nasabah->no_rekening }}</b><br>
						</p>
                    </div>
                    <div class="col-md-6">
						<p>
						Jumlah : <b class="pull-right">Rp. {{ number_format($layanan->layananDetail()->sum('total'),'0',',','.')}} </b><br>
						Biaya : <b class="pull-right">Rp. {{ number_format($layanan->biaya,'0',',','.')}} </b>
						<hr>
						Total : <b class="pull-right">Rp. {{ number_format($layanan->layananDetail()->sum('total')+$layanan->biaya,'0',',','.')}} </b>
					</p>
                    </div>
                </div>
                @if ($layanan->layananDetail->produkLayanan->katLayanan->id == 2)
                	<div class="row">
                		<div class="col-md-6">
                			<label>Bukti pembayaran</label>
                			<input type="file" name="receipt">
                		</div>
                		<div class="col-md-12">
                			<div class="form-group">
		            			<b>Masukkan token listrik</b>
	            				<div class="input-group">
	            				  <input required minlength="4" maxlength="4"  class="form-control" placeholder="XXXX" name="catatan[0]">
	            				  <span class="input-group-addon" id="basic-addon1">-</span>

	            				  <input required minlength="4" maxlength="4"  class="form-control" placeholder="XXXX" name="catatan[1]">
	            				  <span class="input-group-addon" id="basic-addon1">-</span>

	            				  <input required minlength="4" maxlength="4"  class="form-control" placeholder="XXXX" name="catatan[2]">
	            				  <span class="input-group-addon" id="basic-addon1">-</span>

	            				  <input required minlength="4" maxlength="4"  class="form-control" placeholder="XXXX" name="catatan[3]">
	            				  <span class="input-group-addon" id="basic-addon1">-</span>

	            				  <input required minlength="4" maxlength="4"  class="form-control" placeholder="XXXX" name="catatan[4]">
	            				</div>

                			</div>
                		</div>
                	</div>
                @endif
                <button type="submit" class="btn btn-info pull-right">Selesaikan pembayaran</button>
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
	        <h4 class="modal-title text-danger">Anda Yakin Akan Membatalkan Layanan # <span class="label label-warning">{{ $layanan->kode }}</span></h4>
	        <p class="text-muted">Masukkan pesan pembatalan</p>
	      </div>
	      <div class="modal-body">
	        <form action="/layanan/{{$layanan->id}}/batal" method="POST">
				{{ csrf_field() }}
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

{{-- MODAL BAYAR --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="Bayar" tabindex="-1" role="dialog" aria-labelledby="BayarLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title ">Total tagihan yang harus dibayar oleh:</h4>
	        <hr>
	        <form action="/layanan/{{$layanan->id}}/bayar" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="row">
                	<div class="col-md-6">
						<p>
							Nasabah : <b class="pull-right">{{ $layanan->nasabah->name }}</b> <br>
							Kontak : <b class="pull-right">{{ $layanan->nasabah->kontak }}</b> <br>
							No Rekening : <b class="pull-right">{{ $layanan->nasabah->no_rekening }}</b><br>
						</p>
                    </div>
                    <div class="col-md-6">
						<p>
							Pembayaran : <b class="pull-right">{{ $layanan->layananDetail->produkLayanan->katLayanan->name }}</b> <br>
							{{ $layanan->layananDetail->produkLayanan->id == 10 ? 'Rekening kredit' : 'No. ID PLN'}} : <b class="pull-right">{{ $layanan->layananDetail->nomer }}</b> <br>
						</p>
                    </div>
                </div>
                <br>
                <div class="row">
                	<div class="col-md-6">
                		<label>Bukti pembayaran</label>
                		<input type="file" name="receipt">
                	</div>
                	<div class="col-md-6">
                		<div class="input-group">
            				<span class="input-group-addon">
            					Rp.
            				</span>
            				<input type="number" required="" class="form-control" name="total" placeholder="Total tagihan">
            			</div>
                	</div>
                </div>
                <button type="submit" class="btn btn-success pull-right">Bayar layanan</button>
                <div class="clearfix"></div>
            </form>
	      
	      </div>
	      {{-- <div class="modal-body"></div> --}}
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->