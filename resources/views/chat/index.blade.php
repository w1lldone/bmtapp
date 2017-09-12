@extends ('layouts.master')

{{-- @section('breadcrumb')
	<ol class="breadcrumb">
      <li>MKU</li>
    </ol>
@endsection --}}

@section('content')
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="card card-plain" style="margin-bottom: 5px">
				<div class="card-header" data-background-color="bmt-green">
					<h3 class="title">Chat {{-- <span class="label text-warning pull-right">2 baru</span> --}}</h3>
				</div>
			</div>
			<div class="card" style="margin: 0px 0px 5px 0px">
				<form class="form-inline" method="GET" action="/chat" style="padding: 0px 20px;">
	        <div class="form-group">
	        	<label>Filter: </label>
	          <select id="filter" name="filter" class="form-control">
	          	<option value="all">Semua</option>
	            <option value="unread">Belum dibaca</option>
	          </select>
	        </div>
	        <div class="form-group">
	        	<label>Urutkan: </label>
	          <select id="sort" name="sort" class="form-control">
	            <option value="terbaru">Terbaru</option>
	            <option value="terlama">Terlama</option>
	          </select>
	        </div>
	        <div class="form-group">
	          <input id="keyword" type="text" class="form-control" name="keyword" placeholder="Cari">
	        </div>
	        <button type="submit" class="btn btn-round btn-just-icon" style="margin-left: auto;"><i class="material-icons">search</i></button>
          <a href="/chat" class="btn btn-round btn-just-icon btn-warning"><i class="material-icons">refresh</i></a>
	      </form>
			</div>
			<div class="card" style="margin-top: 0">
				<div class="card-content">
{{-- 					@if ($feedbacks->isEmpty())
						<div class="text-center text-muted">
							<i class="material-icons" style="font-size: 6rem">feedback</i>
							<h3 class="title">Pesan</h3>
						</div>
					@endif --}}
					<table class="table table-hover">
					<tbody>
						@foreach ($rooms as $room)
							<tr class="linked-row" data-href="/chat/{{ $room->id }}">
								<td class="hidden-xs"><b>{{ $room->nasabah->name }}</b> <br> <small>{{ $room->admin_chat()->latest()->first()->message }}</small></td>
								<td class="hidden-xs text-right">{{ $room->updated_at->diffForHumans() }}</td>
							</tr>
						@endforeach
					</tbody>
					</table>
				</div>
			</div>
			<div class="text-center">
				{{-- {{ $feedbacks->links() }} --}}
			</div>
		</div>
	</div>

@endsection

@section('script')
	<script type="text/javascript">
		$(".linked-row").click(function() {
        window.location = $(this).data("href");
    });

		@if (request()->has('filter'))
			$(function(){
				$("#sort").val("{{ request('sort') }}");
				$("#filter").val("{{ request('filter') }}");
				$("#keyword").val("{{ request('keyword') }}");
			});
		@endif
    
	</script>
@endsection