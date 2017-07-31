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
											<div class="form-group label-floating">
												<label class="control-label">Nama</label>
												<input type="text" class="form-control" name="name" value="{{ $nasabah->name }}" required>
											</div>
			                            </div>
		                            </div>
		                            <div class="row">
			                            <div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">No Rekening</label>
												<input minlength="12" maxlength="12" type="text" class="form-control" name="no_rekening" required value="{{ $nasabah->no_rekening }}">
											</div>
			                            </div>
		                            </div>
		                            <div class="row">
			                             <div class="col-md-6">
											<div class="form-group label-floating">
												<label class="control-label">No Hp</label>
												<input type="text" class="form-control" name="kontak" value="{{ $nasabah->kontak }}" required>
											</div>
			                            </div>
			                            <div class="col-md-6">
											<div class="form-group label-floating">
												<label class="control-label">Kantor Cabang</label>
												{{-- <input type="text" class="form-control" name="cabang" value="{{ $nasabah->cabang }}" required> --}}
												<select name="cabang" id="cabang" class="form-control">
													<option value="">-- Pilih cabang --</option>
													@foreach (\App\Cabang::all() as $cabang)
														<option value="{{$cabang->id}}">{{$cabang->name}}</option>
													@endforeach
												</select>
											</div>
			                            </div>
		                            </div>
		                            <div class="row">
			                             <div class="col-md-12">
											<div class="form-group label-floating">
												<label class="control-label">Alamat</label>
												<input type="text" class="form-control" value="{{ $nasabah->alamat }}" name="alamat" required>
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
										<div class="form-group label-floating">
											<label class="control-label">Username</label>
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
										<div class="form-group label-floating">
											<label class="control-label">Password Baru</label>
											<input type="text" class="form-control" name="password" required>
										</div>
		                            </div>
		                            <div class="col-md-6">
										<div class="form-group label-floating">
											<label class="control-label">Konfirmasi Password Baru</label>
											<input type="text" class="form-control" name="password_confirmation" required>
										</div>
		                            </div>
		                        </div>
		                        <div class="row">
		                        	<div class="col-md-12">
		                        		<div class="alert alert-warning alert-with-icon" data-notify="container">
									        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
									        <i data-notify="icon" class="material-icons">error</i>
									        <span data-notify="message">Setelah mengubah Password, Harap Hubungi : <strong>{{ $nasabah->kontak }}</strong></span>
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
			$("#cabang").val("{{ $cabang->id }}");
		});
	</script>
@endsection