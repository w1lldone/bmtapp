@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
		<li><a href="/nasabah">Nasabah</a></li>
		<li>Tambah nasabah</li>
	</ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6  col-lg-offset-3">
				@include('layouts.errors')
				<div class="card">
					<div class="card-header" data-background-color="purple">
						<h4 class="title">Pengisian Data Diri</h4>
						<p class="category">BMT Bina Umah Godean</p>
					</div>
					<div class="card-content">
						<form action="/nasabah/create" method="POST">
							{{ csrf_field() }}
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating {{ $errors->has('name') ? ' has-error' : '' }}">
										<label class="control-label">Nama</label>
										<input value="{{ old('name') }}" type="text" class="form-control" name="name" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating {{ $errors->has('username') ? ' has-error' : '' }}">
										<label class="control-label">Username</label>
										<input value="{{ old('username') }}" type="text" class="form-control" name="username" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                            <div class="col-md-6">
									<div class="form-group label-floating {{ $errors->has('password') ? ' has-error' : '' }}">
										<label class="control-label">Password</label>
										<input type="password" class="form-control" name="password" required>
									</div>
	                            </div>
	                             <div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Konfirmasi Password</label>
										<input type="password" class="form-control" name="password_confirmation" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                             <div class="col-md-6">
									<div class="form-group label-floating {{ $errors->has('kontak') ? ' has-error' : '' }}">
										<label class="control-label">No Hp</label>
										<input value="{{ old('kontak') }}" type="text" class="form-control" name="kontak" required>
									</div>
	                            </div>
	                            <div class="col-md-6">
									<div class="form-group label-floating {{ $errors->has('cabang_id') ? ' has-error' : '' }}">
										<label class="control-label">Pilih Cabang</label>
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
									<div class="form-group label-floating">
										<label class="control-label">Alamat</label>
										<input value="{{ old('alamat') }}" type="text" class="form-control" name="alamat" required>
									</div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Rekening tabungan</label>
										<input value="{{ old('no_rekening') }}" type="text" class="form-control" name="no_rekening" minlength="12" maxlength="12" placeholder="1.234.567890">
									</div>
	                            </div>
	                             <div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Rekening kredit</label>
										<input value="{{ old('no_rekening_kredit') }}" type="text" class="form-control" name="no_rekening_kredit" minlength="12" maxlength="12" placeholder="1.234.567890">
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating {{ $errors->has('mku_id') ? ' has-error' : '' }}">
										<label class="control-label">Anggota MKU</label>
										<select name="mku_id" id="mku_id" class="form-control">
											<option value=""></option>
											@foreach (\App\Mku::all() as $mku)
												<option value="{{ $mku->id }}">{{ $mku->name }}</option>
											@endforeach
										</select>
									</div>
	                            </div>
                            </div>
	                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
	                        <div class="clearfix"></div>
	                    </form>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="material-icons">access_time</i> updated 4 minutes ago
						</div>
					</div>
				</div>
		</div>				
	</div>
@endsection