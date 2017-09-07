@extends('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/reminder?view=nasabah">Reminder</a></li>
    <li class="breadcrumb-item active">Detail nasabah</li>
  </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="nasabah-detail">
				<h4><span class="label label-info">{{ $nasabah->cabang->name }}</span></h4>
				<h2 class="title">{{ $nasabah->name }}</h2>
				<h4 class="rekening">Rekening: {{ $nasabah->no_rekening_kredit }}</h4>
				<span class="info"><i class="material-icons">home</i> {{ $nasabah->alamat }}</span><span class="info"><i class="material-icons">phone</i> {{ $nasabah->kontak }}</span>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 20px;">
		<div class="col-lg-12">
			<h3 class="text-muted">Riwayat reminder kredit</h3>
			<div class="card" style="margin: 0">
				<div class="card-content table-responsive">
          <table class="table">
          	<thead class="text-success">
          		<tr>
          			<th>#</th>
          			<th>Tanggal transaksi</th>
          			<th>Diingatkat pada</th>
          		</tr>
          	</thead>
						<tbody>
							@foreach ($nasabah->reminder_detail()->latest()->get() as $detail)
								<tr>
									<td>{{ $loop->index+1 }}</td>
									<td>{{ $detail->reminder->tanggal->format('j F Y') }}</td>
									<td>{{ $detail->created_at->format('j F Y') }}</td>
								</tr>
							@endforeach
						</tbody>	                                
          </table>
        </div>
			</div>
		</div>
	</div>
@endsection