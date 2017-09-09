@extends ('layouts.master')

{{-- @section('breadcrumb')
	<ol class="breadcrumb">
      <li>MKU</li>
    </ol>
@endsection --}}

@section('content')
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<h2 class="title" style="margin: 0px 3px;">Feedback</h2>
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			      	<form class="navbar-form navbar-left">
	              <div class="form-group">
	              	<label>Filter: </label>
	                <select name="filter" class="form-control">
	                	<option></option>
	                  <option value="unread">Belum dibaca</option>
	                  <option class="bug">Bug</option>
	                  <option class="pertanyaan">Pertanyaan</option>
	                  <option class="masukan">Masukan</option>
	                </select>
	              </div>
	              <div class="form-group">
	              	<label>Urutkan: </label>
	                <select class="form-control">
	                  <option></option>
	                  <option>Terbaru</option>
	                  <option>Terlama</option>
	                </select>
	              </div>
	              <div class="form-group">
	                <input type="text" class="form-control" placeholder="Search">
	              </div>
	              <button type="submit" class="btn btn-round btn-just-icon" style="margin-left: auto;"><i class="material-icons">search</i></button>
	            </form>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<div class="card" style="margin-top: 0">
				<div class="card-content">
					<table class="table table-hover">
					<tbody>
						@foreach ($feedbacks as $feedback)
							<tr class="linked-row {{ $feedback->readStatus() }}" data-href="/feedback/{{ $feedback->id }}/view">
								<td>{{ $feedback->nasabah->name }}</td>
								<td><b>{{ $feedback->judul }}</b> - {{ $feedback->isiReduced() }}....</td>
								<td><span class="label label-{{ $feedback->kategoriColor() }}">{{ $feedback->feedback_kategori->name }}</span></td>
								<td>{{ $feedback->created_at->format('j F') }}</td>
							</tr>
						@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('script')
	<script type="text/javascript">
		$(".linked-row").click(function() {
        window.location = $(this).data("href");
    });
	</script>
@endsection