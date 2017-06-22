{{-- modal cek rekening --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="CekRekening" tabindex="-1" role="dialog" aria-labelledby="CekRekeningLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Masukkan Nomor Rekening</h4>
	        <p class="text-muted">Harap bersabar, pengecekan membutuhkan waktu sekitar 30 detik</p>
	      </div>
	      <div class="modal-body">
	        <form action="/nasabah/cek" method="POST" onsubmit="loader()">
				{{ csrf_field() }}
                <div class="row">
                	<div class="col-md-6">
            			<div class="form-group label-floating is-focused">
	            			<label class="control-label">No Rekening</label>
							<input type="text" class="form-control" name="no_rekening" minlength="12" maxlength="12" required placeholder="1.234.567890">
            			</div>
                    </div>
                    <div class="col-md-6">
	        			<div class="form-group label-floating">
		        			<label class="control-label">Cabang</label>
							<select name="cabang" class="form-control">
								@foreach (\App\Cabang::all() as $cabang)
									<option value="{{$cabang->id}}">{{$cabang->name}}</option>
								@endforeach
							</select>
	        			</div>
                    </div>
                </div>
                <div class="spinner pull-right" style="display: none;">
		          <div class="bounce1"></div>
		          <div class="bounce2"></div>
		          <div class="bounce3"></div>
		        </div>
                <button type="submit" class="btn btn-success pull-right">Cek Rekening</button>
                <div class="clearfix"></div>
            </form>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	

	{{-- modal cek membuat kategori --}}
	<div class="modal fade" tabindex="-1" role="dialog" id="newKategori" tabindex="-1" role="dialog" aria-labelledby="newKategoriLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Kategori Baru</h4>
	      </div>
	      <div class="modal-body">
	        <form action="/kategori/produk" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="row">
                	<div class="col-md-6">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" name="name" required placeholder="Masukkan nama kategori baru">
							</div>
						</div>
						<div class="col-md-12">
						    <input title="Masukkan gambar" type="file" name="foto" placeholder="Pilih gambar">
						</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <div class="clearfix"></div>
            </form>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->