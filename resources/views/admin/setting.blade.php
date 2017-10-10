@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="/home">Beranda</a></li>
	  <li>Pengaturan</li>
	</ol>
@endsection

@section('content')

	<div class="row">
		@include('layouts.errors')
		@include('layouts.status')
		<div class="col-lg-6 col-md-12">
			<div class="card">
					<div class="card-header" data-background-color="bmt-green">
						<h4 class="title">Informasi Umum</h4>
						<p class="category">Admin Bi-Mobile App</p>
					</div>
					<div class="card-content">
						<form action="/setting/update" method="POST">
							{{ csrf_field() }}
							{{ method_field('PUT')	}}
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Nama</label>
										<input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Username</label>
										<input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
									</div>
	                            </div>
                            </div>
                            <button type="submit" class="btn btn-success pull-right">Update</button>
	                        <div class="clearfix"></div>
	                    </form>
					</div>
				</div>
		</div>	
		<div class="col-lg-6 col-md-12">
			<div class="card">
					<div class="card-header" data-background-color="orange">
						<h4 class="title">Ganti Password</h4>
						<p class="category">Admin Bi-Mobile App</p>
					</div>
					<div class="card-content">
						<form action="/setting/password" method="POST">
							{{ csrf_field() }}
							{{ method_field('PUT')	}}
	                        <div class="row">
	                            <div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Password Lama</label>
										<input type="text" class="form-control" name="old_password" required>
									</div>
	                            </div>
                            </div>
                            <div class="row">
	                            <div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Password Baru</label>
										<input type="text" class="form-control" name="new_password" required>
									</div>
	                            </div>
	                            <div class="col-md-6">
									<div class="form-group label-floating">
										<label class="control-label">Ulangi Password Baru</label>
										<input type="text" class="form-control" name="new_password_confirmation" required>
									</div>
	                            </div>
                            </div>
                            <button type="submit" class="btn btn-warning pull-right">Update</button>
	                        <div class="clearfix"></div>
	                    </form>
					</div>
				</div>
			</div>	
	</div>
@endsection