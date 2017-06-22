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
									<div class="form-group label-floating">
										<label class="control-label">Nama</label>
										<input type="text" class="form-control" name="name" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Username</label>
										<input type="text" class="form-control" name="username" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                            <div class="col-md-6">
									<div class="form-group label-floating">
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
									<div class="form-group label-floating">
										<label class="control-label">No Hp</label>
										<input type="text" class="form-control" name="kontak" required>
									</div>
	                            </div>
	                            <div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Kantor Cabang</label>
										<input type="text" class="form-control" name="cabang" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                             <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Alamat</label>
										<input type="text" class="form-control" name="alamat" required>
										<input type="hidden" name="nasabah_id" value="{{ $nasabah_id }}">
										<input type="hidden" name="no_rekening" value="{{ $no_rekening }}">
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