@extends('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/home">Beranda</a></li>
      <li>Biaya</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="card">
				<div class="card-header" data-background-color="blue">
					<h4 class="title">Update Biaya Transaksi</h4>
				</div>
				<div class="card-content">
					<div class="row">
						<div class="col-lg-12">
							<form action="/biaya" method="POST">
								{{ csrf_field() }}
								<div class="input-group">
									<span class="input-group-addon">
										Rp.
									</span>
									<input value="{{ $biaya->nominal }}" name="nominal" type="number" class="form-control">
								</div>
								<button type="submit" class="btn btn-info pull-right">Update</button>
								<div class="clearfix"></div>
							</form>
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
@endsection