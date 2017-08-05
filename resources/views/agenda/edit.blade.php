@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/agenda">Agenda</a></li>
      <li>Edit agenda</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			@include('layouts.status')
			@include('layouts.errors')
			<div class="card">
        <div class="card-header" data-background-color="bmt-green">
        	<div class="row">
        		<div class="col-xs-12">
        			<h4 class="title">Form edit agenda MKU</h4>
                <p class="category">BMT mobile app</p>
        		</div>
        	</div>
        </div>
				<div class="card-content">
					<div class="row">
				    <div class="col-lg-12">
				      <form action="/agenda/{{ $agenda->id }}" method="POST">
				      	{{ method_field('PUT') }}
				        {{ csrf_field() }}
				        <div class="row">
				          <div class="col-md-6">
				              <div class="form-group label-floating {{ $errors->has('tanggal') ? ' has-error' : '' }}">
			                  <label class="control-label">Masukkan tanggal</label>
			                  <input class="form-control" id="date" required name="tanggal" type="text" value="{{ $agenda->tanggal->toDateString() }}"/>
				              </div>
				          </div>				          
				          <div class="col-md-6">
				            <div class="form-group input-group bootstrap-timepicker timepicker {{ $errors->has('jam') ? ' has-error' : '' }}">
                      <input id="timepicker1" name="jam" type="text" placeholder="Klik gambar jam" class="form-control input-small" value="{{ $agenda->jam }}">
                      <span class="input-group-addon"><i class="material-icons">access_time</i></span>
                    </div>
					        </div>
				        </div>
				        <div class="row">
				          <div class="col-md-12">
				              <div class="form-group label-floating {{ $errors->has('mku_id') ? ' has-error' : '' }}">
				              	<label class="control-label">Pilih MKU</label>
				              	<select name="mku_id" id="mku_id" class="form-control">
				              		<option value=""></option>
				              		@foreach (\App\Mku::all() as $mku)
				              			<option value="{{ $mku->id }}">{{ $mku->name }}</option>
				              		@endforeach
				              	</select>
				              </div>
				          </div>				          
				        </div>
				        <div class="row">
				          <div class="col-md-6">
				              <div class="form-group label-floating {{ $errors->has('name') ? ' has-error' : '' }}">
				                  <label class="control-label">Nama kegiatan</label>
				                  <input class="form-control" required name="name" type="text" value="{{ $agenda->name }}"/>
				              </div>
				          </div>				          
				          <div class="col-md-6">
				              <div class="form-group label-floating {{ $errors->has('lokasi') ? ' has-error' : '' }}">
				                  <label class="control-label">Lokasi</label>
				                  <input class="form-control" required name="lokasi" type="text" value="{{ $agenda->lokasi }}"/>
				              </div>
				          </div>	
				        </div>
				        <div class="row">
				          <div class="col-md-12">
			              <div class="form-group label-floating {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
		                  <label class="control-label">Deskripsi/catatan</label>
		                  <textarea class="form-control" name="deskripsi">{{ $agenda->deskripsi }}</textarea>
			              </div>
				          </div>				          
				        </div>
				        <button type="submit" class="btn btn-success pull-right">Proses</button>
				        <div class="clearfix"></div>
				      </form> 
				    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
  <script>
  	// DATE PICKER
    $(document).ready(function(){
      var date_input=$('input[name="tanggal"]'); //our date input has the name "date"
      date_input.datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true,
      });
      $("#mku_id").val("{{ $agenda->mku_id }}");
    });


    // TIME PICKER
    $('#timepicker1').timepicker({
    	showMeridian: false,
    	defaultTime: false,
    	disableFocus: true,
    });
  </script>
@endsection
