@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/nasabah">Nasabah</a></li>
		<li>Edit nasabah</li>
	</ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6  col-lg-offset-3">
			@include('layouts.errors')
			@include('layouts.status')
			<div class="card card-nav-tabs">
				<div class="card-header" data-background-color="purple">
					<div class="nav-tabs-navigation">
						<div class="nav-tabs-wrapper">
							<span class="nav-tabs-title">Edit :</span>
							<ul class="nav nav-tabs" data-tabs="tabs">
								<li class="active">
									<a href="#info" data-toggle="tab" aria-expanded="false">
										<i class="material-icons">account_circle</i>
										Info
									<div class="ripple-container"></div></a>
								</li>
								<li class="">
									<a href="#username" data-toggle="tab" aria-expanded="false">
										<i class="material-icons">code</i>
										Username
									<div class="ripple-container"></div></a>
								</li>
								<li class="">
									<a href="#password" data-toggle="tab" aria-expanded="true">
										<i class="material-icons">lock</i>
										Password
									<div class="ripple-container"></div></a>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="card-content">
					<div class="tab-content">
						{{-- #info --}}
						<div class="tab-pane active" id="info">
							<form action="/nasabah/{{ $nasabah->id }}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
										<div class="form-group">
											<label >Nama</label>
											<input type="text" class="form-control" name="name" value="{{ $nasabah->name }}" required>
										</div>
		                            </div>
	                            </div>
	                            <div class="row">
		                            <div class="col-md-6">
										<div class="form-group">
											<label >No Rekening</label>
											<input minlength="8" maxlength="15" type="text" class="form-control" name="no_rekening" value="{{ $nasabah->no_rekening }}">
										</div>
		                            </div>
		                            <div class="col-md-6">
										<div class="form-group">
											<label >No Rekening kredit</label>
											<input minlength="8" maxlength="15" type="text" class="form-control" name="no_rekening_kredit" value="{{ $nasabah->no_rekening_kredit }}">
										</div>
		                            </div>
	                            </div>
	                            <div class="row">
		                             <div class="col-md-6">
										<div class="form-group">
											<label >No Hp</label>
											<input type="text" class="form-control" name="kontak" value="{{ $nasabah->kontak }}" required>
										</div>
		                            </div>
		                            <div class="col-md-6">
										<div class="form-group">
											<label >Kantor Cabang</label>
											<select name="cabang_id" id="cabang_id" class="form-control">
												<option value=""></option>
												@foreach (\App\Cabang::all() as $cabang)
													<option value="{{$cabang->id}}">{{$cabang->name}}</option>
												@endforeach
											</select>
										</div>
		                            </div>
	                            </div>
	                            <div class="row">
		                             <div class="col-md-12">
										<div class="form-group">
											<label >Alamat</label>
											<input type="text" class="form-control" value="{{ $nasabah->alamat }}" name="alamat" required>
										</div>
		                            </div>
		                        </div>
                                <div class="row">
    	                            <div class="col-md-12">
    									<div class="form-group">
    										<label >Anggota MKU</label>
    										<select name="mku_id" id="mku_id" class="form-control">
    											<option value=""></option>
    											@foreach (\App\Mku::all() as $mku)
    												<option value="{{ $mku->id }}">{{ $mku->name }}</option>
    											@endforeach
    										</select>
    									</div>
    	                            </div>
                                </div>
		                        <button type="submit" class="btn btn-primary pull-right">Update</button>
		                        <div class="clearfix"></div>
		                    </form>
						</div>

						{{-- #username --}}
						<div class="tab-pane" id="username">
							<form action="/nasabah/username/{{ $nasabah->id }}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								<div class="row">
		                             <div class="col-md-12">
										<div class="form-group">
											<label >Username</label>
											<input type="text" class="form-control" value="{{ $nasabah->username }}" name="username" required>
										</div>
		                            </div>
		                        </div>
		                        <button type="submit" class="btn btn-primary pull-right">Update</button>
		                        <div class="clearfix"></div>
							</form>
						</div>

						{{-- #password --}}
						<div class="tab-pane" id="password">
							<form action="/nasabah/password/{{ $nasabah->id }}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								<div class="row">
		                             <div class="col-md-6">
										<div class="form-group">
											<label >Password Baru</label>
											<input type="text" class="form-control" name="password" required>
										</div>
		                            </div>
		                            <div class="col-md-6">
										<div class="form-group">
											<label >Konfirmasi Password Baru</label>
											<input type="text" class="form-control" name="password_confirmation" required>
										</div>
		                            </div>
		                            <div class="col-md-12">
										<div class="form-group">
											<label >Password admin</label>
											<input type="password" class="form-control" name="password_admin" required>
										</div>
		                            </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-12">
		                        		<div class="alert alert-warning alert-with-icon" data-notify="container">
									        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									        <i data-notify="icon" class="material-icons">error</i>
									        <span data-notify="message">Setelah mengubah password, harap hubungi nasabah : <strong>{{ $nasabah->kontak }}</strong></span>
									    </div>
		                        	</div>
		                        </div>
		                        <button type="submit" class="btn btn-primary pull-right">Update</button>
		                        <div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>				
		</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(function(){
			$("#cabang_id").val("{{ $nasabah->cabang_id }}");
			$("#mku_id").val("{{ $nasabah->mku_id }}");
		});
	</script>
@endsection